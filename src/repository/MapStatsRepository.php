<?php

require_once 'Repository.php';

class MapStatsRepository extends Repository {

    public function incrementClears(int $mapId) {

        $stmt = $this->database->connect()->prepare('UPDATE users_maps SET clears = clears + 1 WHERE id_users_maps = :mapId');
        $stmt->bindParam(':mapId', $mapId, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function incrementCrashes(int $mapId) {

        $stmt = $this->database->connect()->prepare('UPDATE users_maps SET crashes = crashes + 1 WHERE id_users_maps = :mapId');
        $stmt->bindParam(':mapId', $mapId, PDO::PARAM_INT);
        $stmt->execute();
        
    }
}