<?php

class CampaignMap {

    private $title
    private $map_index;
    private $map_code;

    public function __construct (string $title, string $map_index, string $map_code) {
        
        $this->title = $title;
        $this->map_index = $map_index;
        $this->map_code = $map_code;

    }

    public function getTitle(): string {

        return $this->title;

    }

    public function getMapIndex(): int {

        return $this->map_index;

    }

    public function getMapCode(): string {

        return $this->map_code;

    }

}