<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'SecurityController', 'login');
Routing::get('index', 'SecurityController', 'login');
Routing::get('signUp', 'SecurityController', 'signUp');
Routing::get('login', 'SecurityController', 'login');

Routing::post('login', 'SecurityController', 'login');
Routing::post('signUp', 'SecurityController', 'signUp');
Routing::get('logout', 'SecurityController', 'logout');
Routing::get('changePassword', 'SecurityController', 'changePassword');

Routing::get('mainMenu', 'MainMenuController', 'mainMenu');
Routing::get('options', 'SecurityController', 'options');
Routing::post('options', 'SecurityController', 'options');

Routing::get('levelSelect', 'LevelSelectController', 'levelSelect');
Routing::post('levelSelect', 'LevelSelectController', 'levelSelect');

Routing::get('playCampaign', 'PlayController', 'playCampaign');
Routing::get('playUser', 'PlayController', 'playUser');

Routing::run($path);