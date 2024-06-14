<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/CampaignMap.php';

class CampaignMapRepository extends Repository {

    public function getCampaignMaps(int $limit) {

        

        $pdo = $this->database->connect();

        $limit += 1;

        $stmt = $pdo->prepare('SELECT * FROM "campaign_maps" ORDER BY map_index ASC LIMIT :limit');
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $maps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($maps == false){
            return null;
        }

        $campaignMaps = [];
        

        foreach ($maps as $map) {
            $campaignMaps[] = new CampaignMap($map['title'], $map['map_index'], $map['map_code']);
        }

        return $campaignMaps;


    }

    public function getCampaignMapByIndex(int $index, int $limit) {

        $limit += 1;

        $stmt = $this->database->connect()->prepare('SELECT * FROM campaign_maps WHERE map_index = :index AND map_index <= :limit');
        $stmt->bindParam(':index', $index, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $campaignMap = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($campaignMap == false) {
            return null;
        }

        return new CampaignMap(

            $campaignMap['title'],
            $campaignMap['map_index'],
            $campaignMap['map_code']
            
        );
    }

}