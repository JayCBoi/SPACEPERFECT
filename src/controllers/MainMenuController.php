<?php

require_once 'AppController.php';

class MainMenuController extends AppController {

    public function mainMenu() {

        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        $this->render('mainMenu');
    }
}