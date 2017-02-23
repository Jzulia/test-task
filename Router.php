<?php

class Router {
    
    /**
     * @param $routes
     * @return boolean
     */
    public static function route($routes) {

        if (!array_key_exists($_SERVER["REQUEST_URI"], $routes)) {
            self::error();
            return false;
        }

        $controller = $routes[$_SERVER["REQUEST_URI"]];

        if (is_array($controller)) {

            $class = $controller[0];
            $action = $controller[1];
        } else {

            $class = $controller;
            $action = 'index';
        }

        require_once('controllers/' . strtolower(substr_replace($class, '_', -10, 0)) . '.php');
        $controller = new $class();
        $controller->{$action}();

        return true;
    }
    
    public static function error() {

        http_response_code(404);
        include( '404.php' );
        
    }

}
