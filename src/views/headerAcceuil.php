<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="../../public/assets/css/header.css">
</head>

<body>
    <header id="header">
        <div class="top-bar">
            <div>
                <input type="search" id="Barre de recherche">
                <button>Recherche</button>
            </div>
            <div class="buttons">
                <?php if (is_numeric($_SESSION["id"])) { ?>
                    <button id="connection" onclick="window.location.href='/connexion'">Se connecter</button>
                    <button id="inscription" onclick="window.location.href='/inscription'">S'inscrire</button>
                <?php } else { ?>
                    <button id="favoris" onclick="window.location.href='/page_favoris'">Mes favoris</button>
                    <button id="avis" onclick="window.location.href='/page_avis'">Mes avis</button>
                    <button id="avis" onclick="window.location.href='/page_profil'">profil</button>
                <?php } ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="Plan">Plan des restaurants</a></li>
                <li><a href="Une">Restaurants à la une</a></li>
                <?php if ($_SESSION["id"] != null) { ?>
                    <li><a href="Favoris">Restaurants favoris</a></li>
                    <li><a href="FY">Pour vous</a></li>
                <?php } ?>
                <li><a href="Perso">Nos infos</a></li>
            </ul>
        </nav>
    </header>

</body>

</html>