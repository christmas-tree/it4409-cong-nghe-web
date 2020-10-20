<?php

    class BaseClass{
        protected $name = "BaseName";
        function __construct(){
            echo "In ". $this->name ." constructor<br>";
        }
        function __destruct(){
            echo "Destroying ". $this->name ."<br>";
        }
    }

    class SubClass extends BaseClass{
        function __construct()
        {
            $this->name = "SubClass";
            parent::__construct();
        }

        function __destruct()
        {
            parent::__destruct();
        }
    }
    
    $obj1 = new SubClass();
    $obj2 = new BaseClass();
    //__construct() chạy khi object được khởi tạo
    //__destruct() chạy khi object được giải phóng
?>


