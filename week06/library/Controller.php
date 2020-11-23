<?php

class Controller
{
    function model($model)
    {
        return new $model;
    }

    function view($view, $variables = [])
    {
        extract($variables);

        include(ROOT . DS . 'application'. DS . 'views'. DS . $view . '.php');
    }
}