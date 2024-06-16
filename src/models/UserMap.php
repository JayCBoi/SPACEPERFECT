<?php

class UserMap {

    private $id_user_map;
    private $author;
    private $title;
    private $map_code;
    private $difficulty;
    private $clears;
    private $crashes;
    private $created_at;
    private $created_at_date;

    public function __construct (int $id_user_map, string $author, string $title, string $map_code, int $difficulty, int $clears, int $crashes, string $created_at) {
        
        $this->id_user_map = $id_user_map;
        $this->author = $author;
        $this->title = $title;
        $this->map_code = $map_code;
        $this->difficulty = $difficulty;
        $this->clears = $clears;
        $this->crashes = $crashes;
        $this->created_at = $created_at;

        $this->changeToDate();

    }

    public function changeToDate() {

        $dateTime = new DateTime($this->created_at);
        $this->created_at_date = $dateTime->format('d-m-Y');

    }

    public function getCreatedAtDate(): string{

        return $this->created_at_date;

    }

    public function getIdUserMap(): int {

        return $this->id_user_map;

    }

    public function getAuthor(): string {

        return $this->author;

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

}