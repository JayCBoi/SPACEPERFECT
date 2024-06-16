<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/MainMenuController.php';
require_once 'src/controllers/LevelSelectController.php';
require_once 'src/controllers/PlayController.php';
require_once 'src/controllers/MapEditorController.php';

class Routing {

    public static $routes = [];

    public static function get($url, $controller, $action = 'index') {
        self::$routes['GET'][$url] = ['controller' => $controller, 'action' => $action];
    }

    public static function post($url, $controller, $action = 'index') {
        self::$routes['POST'][$url] = ['controller' => $controller, 'action' => $action];
    }

    public static function run($url) {
        $method = $_SERVER['REQUEST_METHOD'];

        // Usunięcie prefiksu i sufiksu
        $url = trim($url, '/');
        $url = parse_url($url, PHP_URL_PATH);

        // Cięcie URL względem '.php'
        $segments = explode('.php', $url);
        $action = $segments[0];

        if (!array_key_exists($action, self::$routes[$method])) {
            die("Wrong URL!");
        }

        $controller = self::$routes[$method][$action]['controller'];
        $method = self::$routes[$method][$action]['action'];
        $object = new $controller;

        // Pobieranie parametrów z query string (jeśli istnieją)
        $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($queryString, $params);

        // Wywołanie metody kontrolera z parametrami
        call_user_func_array([$object, $method], $params);
    }
}