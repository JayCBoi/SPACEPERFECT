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
Routing::get('deleteAccount', 'SecurityController', 'deleteAccount');
Routing::post('changePassword', 'SecurityController', 'changePassword');

Routing::get('mainMenu', 'MainMenuController', 'mainMenu');
Routing::get('options', 'SecurityController', 'options');
Routing::post('options', 'SecurityController', 'options');

Routing::get('levelSelect', 'LevelSelectController', 'levelSelect');
Routing::post('levelSelect', 'LevelSelectController', 'levelSelect');

Routing::get('playCampaign', 'PlayController', 'playCampaign');
Routing::get('playMap', 'PlayController', 'playMap');

Routing::post('winCampaign', 'PlayController', 'winCampaign');
Routing::post('loseCampaign', 'PlayController', 'loseCampaign');

Routing::post('winMap', 'PlayController', 'winMap');
Routing::post('loseMap', 'PlayController', 'loseMap');

Routing::get('mapEditor', 'MapEditorController', 'mapEditor');
Routing::post('deleteMap', 'MapEditorController', 'deleteMap');
Routing::post('uploadMap', 'MapEditorController', 'uploadMap');
Routing::post('uploadCampaign', 'MapEditorController', 'uploadCampaign');

Routing::run($path);