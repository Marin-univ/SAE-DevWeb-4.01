<?php

namespace src\controllers;

class Map{
    public static function affichage(){
        return <<<HTML
            <section id='Plan'>
                <div id='map'></div>
                <p>Bienvenue sur IUTables’O, votre guide incontournable pour découvrir les meilleurs restaurants d’Orléans ! 🍽️ Que vous soyez amateur de gastronomie, à la recherche d’une nouvelle adresse ou simplement curieux, notre plateforme vous permet de consulter une base de 382 restaurants, d’explorer leurs spécialités et de lire les avis des autres utilisateurs. 🔍 En tant que visiteur, vous pouvez rechercher un restaurant selon différents critères et consulter ses caractéristiques. En vous inscrivant, vous aurez accès aux notes et critiques de la communauté, et pourrez laisser vos propres avis. Rejoignez-nous dès maintenant et trouvez votre prochaine expérience culinaire idéale ! 😋✨</p>
            </section>
            <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpdG08ZPHnOb0noOTfhdz2ZmkiDA6U-wM&callback=initMap"></script>
            <script>
            function initMap() {
                const selector = document.getElementById('map');
                const center = { lat: 47.9, lng: 1.9 };
                const options = {
                    center: center,
                    zoom: 14
                };

                map = new google.maps.Map(selector, options);

                fetch("/public/assets/json/restaurants_orleans.json")
                .then(response => response.json())
                .then(json => {
                    json.forEach(restaurant => {
                        new google.maps.Marker({
                            position: {
                                lat: restaurant["geo_shape"]["geometry"]["coordinates"][1],
                                lng: restaurant["geo_shape"]["geometry"]["coordinates"][0]
                            },
                            map: map
                        });
                    });
                })
                .catch(error => console.error("Erreur de chargement JSON :", error));
            }
            </script>
        HTML;
    }
}
