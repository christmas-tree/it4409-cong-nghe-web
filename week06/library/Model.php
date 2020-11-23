<?php

class Model extends SQLQuery
{
    protected $model;

    function __construct()
    {
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->model = get_class($this);
        $this->table = strtolower($this->model)."s";
    }

    function all()
    {
        $query = 'select * from `' . $this->table. '`';

        return $this->query($query);
    }

    function find($id)
    {
        $query = 'select * from `' . $this->table.'` where `id` = \'' . $id . '\'';

        return $this->query($query, 1);
    }

    function create($data = [])
    {
        $fields = '';
        $values = '';

        foreach ($data as $field => $value) {
            $fields = $fields . $field . ',';
            $values = $values . '\'' . $value . '\',';
        }

        $fields = rtrim($fields, ',');
        $values = rtrim($values, ',');

        return $this->query('insert into ' . $this->table . ' (' . $fields .') values (' . $values .')');
    }

    function delete($id)
    {
        return $this->query('delete from ' . $this->table . ' where id = \'' . $id . '\'');
    }

    function update($id, $data = [])
    {
        $info = '';

        foreach ($data as $field => $value) {
            $info = $info . $field .  '=\'' . $value . '\','; 
        }

        $info = rtrim($info, ',');

        return $this->query('update ' . $this->table . ' set ' . $info .' where id = \'' . $id . '\'');
    }
}
