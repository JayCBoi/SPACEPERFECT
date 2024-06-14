<?php

class User {

    private $user_id;
    private $login;
    private $email;
    private $password;
    private $account_type;
    private $created_at;
    private $levels_cleared;
    private $campaign_levels_cleared;
    private $crashes;
    private $maps_built;

    public function __construct (int $user_id, string $login, string $email, string $password, string $account_type, string $created_at, int $levels_cleared, int $campaign_levels_cleared, int $crashes, int $maps_built) {
        
        $this->user_id = $user_id;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->account_type = $account_type;
        $this->created_at = $created_at;
        $this->levels_cleared = $levels_cleared;
        $this->campaign_levels_cleared = $campaign_levels_cleared;
        $this->crashes = $crashes;
        $this->maps_built = $maps_built;

    }

    public function getUserId(): int {

        return $this->user_id;

    }

    public function getLogin(): string {

        return $this->login;

    }

    public function setLogin(string $login) {

        $this->login = $login;
        
    }

    public function getEmail(): string {

        return $this->email;

    }

    public function setEmail(string $email) {

        $this->email = $email;
        
    }

    public function getPassword(): string {

        return $this->password;

    }

    public function setPassword(string $password) {

        $this->password = $password;
        
    }

    public function getCreatedAt(): string {

        return $this->created_at;

    }

    public function getLevelsCleared(): int {

        return $this->leves_cleared;

    }

    public function setLevelsCleared(int $levels_cleared) {

        $this->leves_cleared = $levels_cleared;

    }

    public function getCampaignLevelsCleared(): int {

        return $this->leves_cleared;

    }

    public function setCampaignLevelsCleared(int $campaign_levels_cleared) {

        $this->campaign_levels_cleared = $campaign_levels_cleared;

    }

    public function getCrashes(): int {

        return $this->crashes;

    }

    public function setCrashes(int $crashes) {

        $this->crashes = $crashes;

    }

    public function getMapsBuilt(): int {

        return $this->maps_built;

    }

    public function setMapsBuilt(int $maps_built) {

        $this->maps_built = $maps_built;

    }

}