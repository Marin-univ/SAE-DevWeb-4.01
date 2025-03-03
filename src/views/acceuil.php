<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>

<body>
    <header>
        <?php include('headerAcceuil.php') ?>
    </header>
    <main>
        <section id="Plan">
            <div id="map"></div>
        </section>
        <section id="Une">
            <h1>Restaurants à la une</h1>
            <article>
                <img src="" alt="">
                <h2></h2>
            </article>
            <article></article>
            <article></article>
            <article></article>
        </section>
        <?php
        // Si l'utilisateur est connecté, on affiche ses favoris et ses avis
        if ($_SESSION["id"] != null) {
            include('acceuilonnecte.php');
        }
        ?>
    </main>
    <footer>
    </footer>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpdG08ZPHnOb0noOTfhdz2ZmkiDA6U-wM&callback=initMap"></script>
    <script>
        function initMap() {
            const selector = document.getElementById("map")
            const center = {
                lat: 47.9,
                lng: 1.9
            }
            const options = {
                center: center,
                zoom: 14,
            }

            const map = new google.maps.Map(selector, options);

            fetch("../../public/assets/json/restaurants_orleans.json")
                .then(response => response.json())
                .then(json => {
                    json.forEach(restaurant => {
                        const marker = new google.maps.Marker({
                            position: {
                                lat: restaurant["geo_shape"]["geometry"]["coordinates"][1],
                                lng: restaurant["geo_shape"]["geometry"]["coordinates"][0]
                            },
                            map: map
                        });
                    });
                })

        }
    </script>
    <style>
        /* Réinitialisation des marges et paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }



        /* ----- MAIN ----- */
        main {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        /* ----- SECTION MAP ----- */
        #Plan {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        #map {
            width: 100%;
            max-width: 800px;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* ----- SECTION RESTAURANTS ----- */
        #Une {
            text-align: center;
            margin-bottom: 40px;
        }

        #Une h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        #Une article {
            display: inline-block;
            width: 22%;
            margin: 1%;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        #Une article:hover {
            transform: scale(1.05);
        }

        #Une article img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        #Une article h2 {
            padding: 10px;
            font-size: 1.2em;
            color: #444;
        }

        /* ----- SECTION UTILISATEUR CONNECTÉ ----- */
        #acceuilonnecte {
            margin-top: 40px;
            padding: 20px;
            background: #f5f5f5;
            border-radius: 10px;
        }

        /* ----- FOOTER ----- */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
        }
    </style>
</body>

</html>