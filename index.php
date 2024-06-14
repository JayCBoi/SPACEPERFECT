<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'SecurityController');
Routing::get('index', 'SecurityController');
Routing::get('signUp', 'SecurityController');

Routing::post('login', 'SecurityController');
Routing::post('signUp', 'SecurityController');
Routing::get('logout', 'SecurityController');

Routing::get('mainMenu', 'MainMenuController');


Routing::run($path);