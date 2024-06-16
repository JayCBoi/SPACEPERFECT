<?php

require_once __DIR__.'/../repository/CampaignMapRepository.php';
require_once __DIR__.'/../repository/UserMapRepository.php';
require_once __DIR__.'/../repository/UserStatsRepository.php';
require_once __DIR__.'/../repository/MapStatsRepository.php';
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

        
        $this->render('playCampaign', [
            'map' => $campaignMap
        ]);
    }

    public function winCampaign() {

        session_start();

        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        if (!isset($_POST['map_index'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/levelSelect");
            return;
        }

        $userId = $_SESSION['user']->getUserId();
        $mapIndex = intval($_POST['map_index']);
        $userStatsRepository = new UserStatsRepository();

        //UP THE CLEAR COUNT
        $userStatsRepository->incrementLevelsCleared($userId);
        $_SESSION['user']->incrementLevelsCleared();


        //UP THE CAMPAIGN PROGRESS
        if($_SESSION['user']->getCampaignLevelsCleared() + 1 == $mapIndex){

            $userStatsRepository->incrementCampaignLevelsCleared($userId);
            $_SESSION['user']->incrementCampaignLevelsCleared();

        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/levelSelect");

    }

    public function loseCampaign() {

        session_start();

        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        if (!isset($_POST['map_index'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/levelSelect");
            return;
        }

        $userId = $_SESSION['user']->getUserId();
        $userStatsRepository = new UserStatsRepository();

        //UP THE CRASH COUNT
        $userStatsRepository->incrementCrashes($userId);
        $_SESSION['user']->incrementCrashes();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/levelSelect");

    }

    public function playMap() {

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

        $userMapRepository= new UserMapRepository();
        $userMap = $userMapRepository->getUserMapById($mapIndex);

        if (!$userMap) {
            $this->render('mainMenu', ['messages' => ['User map not found.']]);
            return;
        }

        
        $this->render('playMap', [
            'map' => $userMap
        ]);
    }

    public function winMap() {

        session_start();

        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        if (!isset($_POST['map_index'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/levelSelect");
            return;
        }

        $userId = $_SESSION['user']->getUserId();
        $mapIndex = intval($_POST['map_index']);

        $userStatsRepository = new UserStatsRepository();
        $mapStatsRepository = new MapStatsRepository();

        //UP THE CLEAR COUNT
        $userStatsRepository->incrementLevelsCleared($userId);
        $_SESSION['user']->incrementLevelsCleared();


        //UP THE MAP PROGRESS
        $mapStatsRepository->incrementClears($mapIndex);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/levelSelect");

    }

    public function loseMap() {

        session_start();

        if (!isset($_SESSION['user'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();
        }

        if (!isset($_POST['map_index'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/levelSelect");
            return;
        }

        $userId = $_SESSION['user']->getUserId();
        $mapIndex = intval($_POST['map_index']);

        $userStatsRepository = new UserStatsRepository();
        $mapStatsRepository = new MapStatsRepository();

        //UP THE CRASH PLAYER COUNT
        $userStatsRepository->incrementCrashes($userId);
        $_SESSION['user']->incrementCrashes();

        //UP THE CRASH MAP COUNT
        $mapStatsRepository->incrementCrashes($mapIndex);
        

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/levelSelect");

    }
}