<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <style>
        /* Style général du header */
        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-image: url("../../public/assets/images/image_header.png");
        }

        /* Conteneur pour la barre de recherche et les boutons */
        .top-bar {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
        }

        /* Alignement des boutons à droite */
        .buttons {
            display: flex;
            gap: 10px;
        }

        /* Style de la barre de recherche */
        label {
            font-size: 18px;
            margin-right: 10px;
        }

        input[type="search"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #555;
        }

        /* Navigation en dessous */
        nav {
            margin-top: 50px;
            
        }

        nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            border: solid black;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #ff6600;
        }
    </style>
  </head>
  <body>
    <header id="header">
        <div class="top-bar">
            <div>
                <label for="Barre de recherche">Rechercher un restaurant</label>
                <input type="search" id="Barre de recherche">
                <button>Recherche</button>
            </div>
            <div class="buttons">
                <?php if($_SESSION["id"]==null){ ?>
                    <button id="connection" onclick="window.location.href='/connection'">Se connecter</button>
                    <button id="inscription" onclick="window.location.href='/inscription'">S'inscrire</button>
                <?php } else { ?>
                    <button id="favoris" onclick="window.location.href='/page_favoris'">Mes favoris</button>
                    <button id="avis" onclick="window.location.href='/page_avis'">Mes avis</button>
                <?php } ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="Plan">Plan des restaurants</a></li>
                <li><a href="Une">Restaurants à la une</a></li>
                <?php if($_SESSION["id"]!=null){ ?>
                    <li><a href="Favoris">Restaurants favoris</a></li>
                    <li><a href="FY">Pour vous</a></li>
                <?php } ?>
                <li><a href="Perso">Nos infos</a></li>
            </ul>
        </nav>
    </header>
  </body>
</html>
