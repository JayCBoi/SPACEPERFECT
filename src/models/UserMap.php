<?php

class UserMap {

    private $title
    private $map_code;
    private $difficulty;
    private $clears;
    private $crashes;
    private $created_at;

    public function __construct (string $title, string $map_code, int $difficulty, int $clears, int $crashes, string $created_at) {
        
        $this->title = $title;
        $this->map_code = $map_code;
        $this->difficulty = $difficulty;
        $this->clears = $clears;
        $this->crashes = $crashes;
        $this->created_at = $created_at;

    }

    public function getTitle(): string {

        return $this->title;

    }

    public function setTitle(string $title) {

        $this->title = $title;
        
    }

    public function getMapCode(): string {

        return $this->map_code;

    }

    public function setMapCode(string $map_code) {

        $this->map_code = $map_code;
        
    }

    public function getDifficulty(): int {

        return $this->difficulty;

    }

    public function setDifficulty(int $login) {

        $this->difficulty = $difficulty;
        
    }

    public function getClears(): int {

        return $this->clears;

    }

    public function setClears(int $clears) {

        $this->clears = $clears;
        
    }

    public function getCrashes(): int {

        return $this->crashes;

    }

    public function setCrashes(int $crashes) {

        $this->crashes = $crashes;
        
    }

    public function getCreatedAt(): string {

        return $this->created_at;

    }

    public function setMapCode(string $created_at) {

        $this->created_at = $created_at;
        
    }

}