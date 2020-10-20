<?php
    // spl_autoload_register(function ($class) {
    //     $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    //     if (file_exists($file)) {
    //         require $file;
    //         return true;
    //     }
    //     return false;
    // });

    require_once "Rectangle.php";
    require_once "Triangle.php";
    require_once "Circle.php";
    require_once "Color.php";

    $myCollection = array();

    $r = new Rectangle;
    $r->width=5;
    $r->height=7;
    $myCollection[] = $r;
    unset($r);

    $t = new Triangle;
    $t->width=5;
    $t->height=7;
    $myCollection[] = $t;
    unset($t);

    $c=new Circle;
    $c->radius=3;
    $myCollection[]=$c;
    unset($c);

    $c=new Color;
    $c->name='blue';
    $myCollection[]=$c;
    unset($c);

    foreach ($myCollection as $s) {
        if($s instanceof Shape)
        {
            echo "Area: ".$s->getArea()."<br>\n";
        }

        if($s instanceof Polygon)
        {
            echo "Sides: ".$s->getNumberOfSides()."<br>\n";
        }

        if($s instanceof Color)
        {
            echo "Color: ".$s->name."<br>\n";
        }

        echo "<br>\n";
    }
?>