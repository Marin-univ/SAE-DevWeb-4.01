<?php
namespace src\controllers;

class Map{
    public static function affichage(){
        return "
        <section id='Plan'>
            <div id='map'></div>
        </section>
        <script async src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCpdG08ZPHnOb0noOTfhdz2ZmkiDA6U-wM&callback=initMap'></script>
        <script>
        function initMap() {
            const selector = document.getElementById('map');
            const center = { lat: 47.9, lng: 1.9 };
            const options = {
                center: center,
                zoom : 14
            };

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
        ";
    }
}
