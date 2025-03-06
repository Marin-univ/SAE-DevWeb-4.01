<?php 
namespace src\views;
use src\controllers\RestaurantsUne;
use src\controllers\Map;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/public/assets/css/pageAcceuil.css">
</head>
<body>
    <header>
        <?php include 'headerAcceuil.php'?>
    </header>
    <main>
        <?php 
        echo Map::affichage();
        echo RestaurantsUne::affichage();

        if($_SESSION["id"]!=null){
            include 'acceuilonnecte.php';
        }
        ?>
    </main>
    <footer>
    </footer>
    
</body>
</html>
