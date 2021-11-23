<?php
    // require "./Core/Controller.php";
    // require "./Core/DB.php";
    // $controllerName = ucfirst($_REQUEST['controller']??'Home').'Controller';
    // $actionName = $_REQUEST['action']??'show';
    // require "./Controllers/${controllerName}.php";
    // $controller = new $controllerName;
    // $controller->$actionName();
    session_start();

    require_once "./mvc/index.php";
    $myApp = new App();
?>