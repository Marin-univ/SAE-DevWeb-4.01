<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="/public/assets/css/headerAcceuil.css">
  </head>
  <header id="header">
    <label for="Barre de recherche">rechercher un restaurant</label>
    <input type="search" id="Barre de recherche">
    <button>Recherche</button>
    <?php
    if($_SESSION["id"]==null){?>
        <button id="connection" onlick="window.location.href='/connection'">Se connecter</button>
        <button id="inscription" onlick="window.location.href='/inscription'">S'inscrire</button>
    <?php }
    if($_SESSION["id"]!=null){
        ?>
        <button id="favoris" onlick="window.location.href='/page_favoris'">Mes favoris</button>
        <button id="avis" onlick="window.location.href='/page_avis'">Mes avis</button>
    <?php
    }
    ?>
    <nav>
        <ul>
            <li><a href="Plan">Plan des restaurants</a></li>
            <li><a href="Une">Restaurants à la une</a></li>
            <?php
            if($_SESSION["id"]!=null){
                ?>
                <li><a href="Favoris">Restaurants favoris</a></li>
                <li><a href="FY">Pour vous</a></li>
            <?php
            }
            ?>
            <li><a href="Perso">Nos infos</a></li>
        </ul>
    </nav>
  </header>
</html>