<?php

require_once 'Repository.php';

class UserStatsRepository extends Repository {

    public function incrementLevelsCleared(int $userId) {

        $stmt = $this->database->connect()->prepare('UPDATE users_stats SET levels_cleared = levels_cleared + 1 WHERE id_users_stats = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function incrementCampaignLevelsCleared(int $userId) {

        $stmt = $this->database->connect()->prepare('UPDATE users_stats SET campaign_levels_cleared = campaign_levels_cleared + 1 WHERE id_users_stats = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function incrementCrashes(int $userId) {

        $stmt = $this->database->connect()->prepare('UPDATE users_stats SET crashes = crashes + 1 WHERE id_users_stats = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        
    }
}