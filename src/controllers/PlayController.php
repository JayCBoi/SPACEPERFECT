<?php

require_once __DIR__.'/../repository/CampaignMapRepository.php';
require_once __DIR__.'/../repository/UserMapRepository.php';
require_once 'AppController.php';

class PlayController extends AppController {

    public function playCampaign() {

        session_start();

        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }
        
        if (!isset($_GET['map_id'])) {
            $this->render('mainMenu', ['messages' => ['No map index provided.']]);
            return;
        }

        $mapIndex = $_GET['map_id'];
        $limit = $_SESSION['user']->getCampaignLevelsCleared();
        //die(var_dump($mapIndex));

        $campaignMapRepository= new CampaignMapRepository();
        $campaignMap = $campaignMapRepository->getCampaignMapByIndex($mapIndex, $limit);

        if (!$campaignMap) {
            $this->render('mainMenu', ['messages' => ['Campaign map not found.']]);
            return;
        }

        
        $this->render('playCampaign', ['map' => $campaignMap]);
    }

    public function playUser() {

        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }


    }

}