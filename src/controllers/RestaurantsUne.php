<?php
namespace src\controllers;
use src\controllers\Database;
use src\controllers\Restaurant;

class RestaurantsUne{
    public static function affichage(){
        $bd = Database::getMysqlConnection();
        $requete = "SELECT idR, typeR, nameR, telephone, website FROM RESTAURANT NATURAL JOIN AVIS NATURAL JOIN CONTACT WHERE dateA >= CURDATE() - INTERVAL 7 DAY GROUP BY idR HAVING AVG(note) >= 3 ORDER BY AVG(note) DESC LIMIT 4;";
        $execution = $bd->prepare($requete);
        $execution->execute();
        $lesResto = $execution->fetchAll();
        
        $html = '<link rel="stylesheet" href="/public/assets/css/Une.css">
                <section id="Une">
                <h1>Restaurants à la une</h1>
                <div class="restaurants-container">';

        foreach ($lesResto as $resto) {
            $restaurant = new Restaurant($resto['idR'], $resto['typeR'], $resto['nameR'], $resto['telephone'], $resto['website']);
            $html .= $restaurant->affichage();
        }

        $html .= '</div></section>';

        return $html;
    }
}
