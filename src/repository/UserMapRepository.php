<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/UserMap.php';

class UserMapRepository extends Repository {

    public function getUserMaps(int $id) {

        $pdo = $this->database->connect();

        $stmt = $pdo->prepare('SELECT * FROM users_maps WHERE id_users = :id ORDER BY created_at DESC LIMIT 10');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $maps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($maps == false){
            return null;
        }

        $userMaps = [];
        

        foreach ($maps as $map) {
            $userMaps[] = new UserMap($map['id_users_maps'], $map['author'], $map['title'], $map['map_code'], $map['difficulty'], $map['clears'], $map['crashes'], $map['created_at']);
        }

        return $userMaps;

    }

    public function getCommunityMaps() {

        $pdo = $this->database->connect();

        $stmt = $pdo->query('SELECT * FROM users_maps ORDER BY created_at DESC LIMIT 10');
        $maps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($maps == false){
            return null;
        }

        $communityMaps = [];
        

        foreach ($maps as $map) {
            $communityMaps[] = new UserMap($map['id_users_maps'], $map['author'], $map['title'], $map['map_code'], $map['difficulty'], $map['clears'], $map['crashes'], $map['created_at']);
        }

        return $communityMaps;

    }

    public function getUserMapById($id) {

        $stmt = $this->database->connect()->prepare('SELECT * FROM users_maps WHERE id_users_maps = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $userMap = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userMap == false) {
            return null;
        }

        return new UserMap(
            $userMap['id_users_maps'],
            $userMap['id_users'],
            $userMap['author'],
            $userMap['title'],
            $userMap['map_code'],
            $userMap['difficulty'],
            $userMap['clears'],
            $userMap['crashes'],
            $userMap['created_at']
        );
        
    }

}