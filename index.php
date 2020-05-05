<?php

    if (isset($_GET['controller']) && isset($_GET['method'])) {
        $controller = $_GET['controller'];
        $method = $_GET['method'];
    } else {
        $controller = 'Index';
        $method = 'home';
    }
    
    require "controllers/{$controller}.controller.php";
    
    call_user_func(["{$controller}Controller", $method]);