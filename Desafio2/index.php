<?php

    include_once 'core/Routing.php';
    include_once 'core/config.php';
    include_once 'Controllers/CategoriasController.php';
    include_once 'Controllers/ProductosController.php';
    include_once 'Controllers/UsuariosController.php';
    include_once 'Controllers/IndexPublicController.php';


    $router = new Routing();

    $controller = $router->controller;
    $method = $router->method;
    $param = $router->param;
    session_start();
    $controller = new $controller;
    $controller->$method($param);