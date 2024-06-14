<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserMap.php';

class UserMapRepository extends Repository {

    public function getUserMap(int $id) {

        

        $pdo = $this->database->connect();

        $stmt = $pdo->prepare('SELECT * FROM "user_maps" WHERE id_user_maps = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        
        
        try {

            $stmt->execute();

        } catch (PDOException $e) {

            echo 
            die('ERROR WITH STATEMENT:' . $e->getMessage());

        }

        
        

        $map = $stmt->fetch(PDO::FETCH_ASSOC);

        if($map == false){
            return null;
        }

        return new UserMap(

            $map['title'],
            $map['map_code'],
            $map['difficulty'],
            $map['clears'],
            $map['crashes'],
            $map['created_at']

        );

    }

    public function getUserMaps

}