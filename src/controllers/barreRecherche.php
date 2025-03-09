<?php

namespace src\controllers;
require_once __DIR__ . "/Database.php";
use src\controllers\Database;

if (isset($_GET["q"])) {
    $search = htmlspecialchars($_GET["q"]); 
    $search = "%$search%"; 

    $bd = Database::getMysqlConnection();


    $query = $bd->prepare("SELECT idR,nameR FROM RESTAURANT WHERE nameR LIKE :search LIMIT 6" );
    $query->bindParam(":search",$search);
    $query->execute();

    $results = $query->fetchAll();

    if ($results) {
        foreach ($results as $restaurant) {
            echo "<a href='/restaurant/".htmlspecialchars($restaurant["idR"])."'<p><strong>" . htmlspecialchars($restaurant["nameR"]) . "</strong></p>";
        }
    } else {
        echo "<p>Aucun résultat trouvé.</p>";
    }
}
?>
