<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/CampaignMap.php';

class CampaignMapRepository extends Repository {

    public function getCampaignMap(int $id) {

        

        $pdo = $this->database->connect();

        $stmt = $pdo->prepare('SELECT * FROM "campaign_maps" WHERE id_campaign_maps= :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        
        
        try {

            $stmt->execute();

        } catch (PDOException $e) {

            echo 
            die('ERROR WITH STATEMENT:' . $e->getMessage());

        }

        
        

        $c_map = $stmt->fetch(PDO::FETCH_ASSOC);

        if($c_map == false){
            return null;
        }

        return new CampaignMap(

            $c_map['title'],
            $c_map['map_index'],
            $c_map['map_code']
            
        );


    }

}