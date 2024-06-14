<?php

require_once __DIR__.'/../repository/CampaignMapRepository.php';
require_once __DIR__.'/../repository/UserMapRepository.php';
require_once 'AppController.php';

class LevelSelectController extends AppController {

    public function levelSelect() {

        session_start();

        if (!isset($_SESSION['user'])) {
            
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit();

        }

        $campaignMapRepository = new CampaignMapRepository();
        $campaignMaps = $campaignMapRepository->getCampaignMaps($_SESSION['user']->getCampaignLevelsCleared());

        $userMapRepository = new UserMapRepository();
        $userMaps = $userMapRepository->getUserMaps($_SESSION['user']->getUserId());

        //die(var_dump($userMaps));

        $userMapRepository = new UserMapRepository();
        $communityMaps = $userMapRepository->getCommunityMaps();

        //die(var_dump($communityMaps));

        $this->render('levelSelect', [
            'campaignMaps' => $campaignMaps,
            'userMaps' => $userMaps,
            'communityMaps' => $communityMaps
        ]);
    }

}