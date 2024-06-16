<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserMapRepository.php';
require_once __DIR__.'/../repository/CampaignMapRepository.php';

class MapEditorController extends AppController {

    public function mapEditor() {

        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        $userMapRepository = new UserMapRepository();
        $userMaps = $userMapRepository->getUserMaps($_SESSION['user']->getUserId());

        $this->render('mapEditor', [
            'userMaps' => $userMaps,
        ]);
    }

    public function deleteMap() {
        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        if(!$this->isPost()) {

            return $this->render('mainMenu');

        }

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        
        if($contentType === 'application/json'){

            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userMapRepository = new UserMapRepository();
            $mapId = $decoded['mapId'];

            $map = $userMapRepository->getUserMapById($mapId);

            if($map){

                if($_SESSION['user']->getLogin() == $map->getAuthor()){

                    http_response_code(200);
                    $userMapRepository->deleteUserMap($mapId);
                    $_SESSION['user']->decrementMapsBuilt();

                }
            }
        }
    }

    public function uploadMap() {
        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        if(!$this->isPost()) {

            return $this->render('mainMenu');

        }

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        
        if($contentType === 'application/json'){

            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userMapRepository = new UserMapRepository();

            $userId = $_SESSION['user']->getUserId();
            $userLogin = $_SESSION['user']->getLogin();
            $mapTitle= $decoded['mapTitle'];
            $mapCode= $decoded['mapCode'];
            $mapDifficulty= $decoded['mapDifficulty'];
            
            $userMadeMaps =  $_SESSION['user']->getMapsBuilt();
            


            if($userMadeMaps<4 || ($_SESSION['user']->getUserAccountType() == 1)){

                http_response_code(200);
                $userMapRepository->uploadUserMap($userId, $userLogin, $mapTitle, $mapCode, $mapDifficulty);
                $_SESSION['user']->incrementMapsBuilt();

            }
        }
    }

    public function uploadCampaign() {
        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        if ($_SESSION['user']->getUserAccountType() != 1) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/mainMenu");
            exit();

        }

        if(!$this->isPost()) {

            return $this->render('mainMenu');

        }

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        
        if($contentType === 'application/json'){

            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $userMapRepository = new CampaignMapRepository();


            $campTitle= $decoded['campTitle'];
            $campIndex= $decoded['campIndex'];
            $campCode= $decoded['campCode'];
            

            http_response_code(200);
            $userMapRepository->uploadCampaignMap($campTitle, $campIndex, $campCode);

        }
    }

}