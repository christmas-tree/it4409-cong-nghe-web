<?php
    class Counter
    {
        private static $count=0;
        const VERSION=2.0;

        function __construct()
        {
            self::$count++;
        }

        function __destruct()
        {
            self::$count--;
        }

        static function getCount()
        {
            return self::$count;
        }
    }

    $c1=new Counter();
    echo $c1->getCount()."<br>\n";

    $c2=new Counter();
    echo Counter::getCount()."<br>\n";

    $c2=NULL; //$c2 giải phóng object Counter và gán thành NULL -> $count--

    echo $c1->getCount()."<br>\n";

    echo "Version: " . Counter::VERSION . "<br>\n";
    
?>