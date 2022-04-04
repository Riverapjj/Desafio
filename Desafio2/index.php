<?php

    include_once 'core/Routing.php';
    include_once 'core/config.php';
    include_once 'Controllers/EditorialesController.php';
    include_once 'Controllers/AutoresController.php';
    include_once 'Controllers/LibrosController.php';

    $router = new Routing();

    $controller = $router->controller;
    $method = $router->method;
    $param = $router->param;

    $controller = new $controller;
    $controller->$method($param);