<?php
namespace src\controllers;
use src\controllers\Database;
use src\controllers\Restaurant;

class RestaurantsUne{
    public static function affichage(){
        $bd = Database::getMysqlConnection();
        $requete = "SELECT typeR, nameR, telephone, website FROM RESTAURANT NATURAL JOIN AVIS NATURAL JOIN CONTACT GROUP BY idR ORDER BY AVG(note) DESC LIMIT 4";
        $execution = $bd->prepare($requete);
        $execution->execute();
        $lesResto = $execution->fetchAll();
        
        $html = '<link rel="stylesheet" href="/public/assets/css/Une.css">
                <section id="Une">
                <h1>Restaurants à la une</h1>
                <div class="restaurants-container">';

        foreach ($lesResto as $resto) {
            $restaurant = new Restaurant($resto['typeR'], $resto['nameR'], $resto['telephone'], $resto['website']);
            $html .= $restaurant->affichage();
        }

        $html .= '</div></section>';


        return $html;
    }
}