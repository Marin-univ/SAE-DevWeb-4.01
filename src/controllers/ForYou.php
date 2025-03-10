<?php
namespace src\controllers;
class ForYou{
    public static function affichage(){
        $bd = Database::getMysqlConnection();
        $requete = "SELECT idR,typeR, nameR, telephone, website,note FROM RESTAURANT  NATURAL JOIN USERS NATURAL JOIN AVIS NATURAL JOIN CONTACT WHERE idU=:id  GROUP BY idR HAVING note >=3 ORDER BY note DESC LIMIT 4";
        $execution = $bd->prepare($requete);
        $execution->bindParam(":id",$_SESSION["id"]);
        $execution->execute();
        $lesResto = $execution->fetchAll();

        if(!empty($lesResto)){
        
            $html = '<link rel="stylesheet" href="/public/assets/css/Une.css">
                    <section id="FY">
                    <h1>Pour vous</h1>
                    <div class="restaurants-container">';

            foreach ($lesResto as $resto) {
                $restaurant = new Restaurant($resto['idR'], $resto['typeR'], $resto['nameR'], $resto['telephone'], $resto['website']);
                $html .= $restaurant->affichage();
            }

            $html .= '</div></section>';
        }
        else{
            $html="";
        }

        return $html;
    }
}
