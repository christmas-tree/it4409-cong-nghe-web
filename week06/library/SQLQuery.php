<?php

class SQLQuery
{
    protected $dbHandle;
    protected $result;

    /** Connects to database */

    function connect($address, $account, $pwd, $name)
    {
        $this->dbHandle = mysqli_connect($address, $account, $pwd);
        if ($this->dbHandle) {
            if (mysqli_select_db($this->dbHandle, $name)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /** Disconnect from database */

    function disconnect()
    {
        if (mysqli_close($this->dbHandle) != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    /** custom sql query */

    function query($query, $singleResult = 0)
    {
        $this->result = mysqli_query($this->dbHandle, $query);

        if (preg_match("/select/i", $query)) {
            $result = array();
            $table = array();
            $field = array();
            $tempResults = array();
            $numOfFields = mysqli_num_fields($this->result);
            for ($i = 0; $i < $numOfFields; $i++) {
                $tableInfo = mysqli_fetch_field_direct($this->result, $i);
                array_push($table, $tableInfo->table);
                array_push($field, $tableInfo->name);
            }

            while ($row = mysqli_fetch_row($this->result)) {
                for ($i = 0; $i < $numOfFields; $i++) {
                    $table[$i] = trim(ucfirst($table[$i]), "s");
                    $tempResults[$table[$i]][$field[$i]] = $row[$i];
                }
                if ($singleResult == 1) {
                    mysqli_free_result($this->result);
                    
                    return $tempResults;
                }
                array_push($result, $tempResults);
            }
            mysqli_free_result($this->result);

            return($result);
        }
    }

    /** Get number of rows */
    function getNumRows()
    {
        return mysqli_num_rows($this->result);
    }

    /** Free resources allocated by a query */
    function freeResult()
    {
        mysqli_free_result($this->result);
    }

    /** Get error string */
    function getError()
    {
        return mysqli_error($this->dbHandle);
    }
}
