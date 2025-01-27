<?php

namespace src\controllers;

class GestionJSON {
    private $quizData;

    public function __construct() {
        $json = file_get_contents(__DIR__ . '/../../public/assets/json/restaurants_orleans.json');
        $this->quizData = json_decode($json, true);
    }

    public function getRestaurants($osm_id){
        foreach ($this->quizData as $restaurant) {
            if ($restaurant['osm_id'] == "node/$osm_id") {
                return json_encode($restaurant);
            }
        }
        return null;
    }
}


