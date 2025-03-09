<?php

namespace src\controllers;
require_once __DIR__ . "/Database.php";
use src\controllers\Database;

if (isset($_GET["recherche"])) {
    $search = htmlspecialchars($_GET["recherche"]); 
    $search = "%$search%"; 

    $bd = Database::getMysqlConnection();

    $requete = $bd->prepare("SELECT idR,nameR FROM RESTAURANT WHERE nameR LIKE :search LIMIT 6" );
    $requete->bindParam(":search",$search);
    $requete->execute();
    $results = $requete->fetchAll();

    if ($results) {
        foreach ($results as $restaurant) {
            echo "<a href='/restaurant/".htmlspecialchars($restaurant["idR"])."'<p><strong>" . htmlspecialchars($restaurant["nameR"]) . "</strong></p>";
        }
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
}

