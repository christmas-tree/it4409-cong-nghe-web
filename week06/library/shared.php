<?php

/** Autoload any classes that are required */
spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'library' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'library' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . $className . '.php');
    } else {
        /** Error generation code here */
    }
});

/** check if environment is development and display errors */
function setReporting() {
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
}

/** check register globals and remove them */
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main call function */
function callHook() {
    global $url;

    $urlArray = array();
    if ($url === "public/") {
        $controller = CONTROLLER_DEFAULT;
        $action = ACTION_DEFAULT;
    } else {
        $urlArray = explode("/", $url);

        $controller = $urlArray[0];
        array_shift($urlArray);
        $action = $urlArray[0] ?? ACTION_DEFAULT;
        array_shift($urlArray);
        $queryString = $urlArray;
    }

    $controller = ucwords($controller);
    $controller .= 'Controller';
    if (class_exists($controller)) {
        $dispatch = new $controller;

        if ((int) method_exists($controller, $action)) {
            call_user_func_array(array($dispatch, $action), $queryString ?? []);
        } else {
            /** Error generation code here */
        }
    } else {
        echo '404 Not found';
    }
}

setReporting();
unregisterGlobals();
callHook();
