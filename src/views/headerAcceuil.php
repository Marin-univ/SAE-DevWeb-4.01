<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <style>
        /* Style général du header */
        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-image: url("../../public/assets/images/image_header.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            position: relative;
            color: white;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            height: 300px;
        }

        /* Conteneur pour la barre de recherche et les boutons */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.7);
            /* Fond semi-transparent */
            border-radius: 8px;
        }

        /* Alignement des boutons à droite */
        .buttons {
            display: flex;
            gap: 15px;
        }

        button {
            padding: 10px 15px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease-in-out, transform 0.2s;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        button:hover {
            background-color: #e65c00;
            transform: scale(1.05);
        }

        /* Style de la barre de recherche */
        .search-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="search"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: inset 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 18px;
        }

        /* Navigation */
        nav {
            margin-top: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px 0;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
            transition: color 0.3s ease-in-out, background 0.3s;
            border-radius: 5px;
        }

        nav ul li a:hover {
            color: white;
            background-color: #ff6600;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="top-bar">
            <div>
                <input type="search" id="Barre de recherche">
                <button>Recherche</button>
            </div>
            <div class="buttons">
                <?php if ($_SESSION["id"] == null) { ?>
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