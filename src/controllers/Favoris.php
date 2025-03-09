<?php
namespace src\controllers;
class Favoris{
    public static function affichage(){
        $bd = Database::getMysqlConnection();
        $requete = "SELECT idR, nameR, typeR, telephone, website FROM AIMER NATURAL JOIN RESTAURANT NATURAL JOIN CONTACT WHERE idU=:id LIMIT 4";
        $execution = $bd->prepare($requete);
        $execution->bindParam(":id",$_SESSION["id"]);
        $execution->execute();
        $lesResto = $execution->fetchAll();
        
        $html = '<link rel="stylesheet" href="/public/assets/css/Une.css">
                <section id="Favoris">
                <h1>Favoris</h1>
                <div class="restaurants-container">';
        if(empty($lesResto)){
            $html .= "<h2>Vous n'avez pas encore de favoris";
        }
        else{
            foreach ($lesResto as $resto) {
                $restaurant = new Restaurant($resto['idR'], $resto['typeR'], $resto['nameR'], $resto['telephone'], $resto['website']);
                $html .= $restaurant->affichage();
            }
        }

        $html .= '</div></section>';


        return $html;
    }
}

