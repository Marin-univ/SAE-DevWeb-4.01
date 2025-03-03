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
        <?php include('headerAcceuil.php')?>
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
        if($_SESSION["id"]!=null){
            include('acceuilonnecte.php');
        }
        ?>
    </main>
    <footer>
    </footer>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpdG08ZPHnOb0noOTfhdz2ZmkiDA6U-wM&callback=initMap"></script>
    <script>
        function initMap() {
            const selector = document.getElementById("map")
            const center = { lat: 47.9, lng: 1.9}            
            const options = {
                center: center,
                zoom : 14,
            }

            const map = new google.maps.Map(selector, options);
        }
    </script>
    <style>
        #map {
    width: 600px;
    height: 600px;
    background: #d6d6d6;
}

    </style>
</body>
</html>