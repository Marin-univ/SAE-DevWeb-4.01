<?php

namespace src\controllers;

class Restaurant{
    public $type;
    public $nom;
    public $phone;
    public $website;

    public function __construct($type, $nom, $phone, $website) {
        $this->type = $type;
        $this->nom = $nom;
        $this->phone = $phone;
        $this->website = $website;
    }

    public function affichage(){
        $chemin_image="/public/assets/images/" . $this->type . ".png";
        return <<<HTML
            <link rel="stylesheet" href="/public/assets/css/restaurantUnique.css">
            <section id="section-détail-resto">
                <img id="image-resto" src="{$chemin_image}" alt="image resto">
                 <h4 class="texte-resto">$this->nom</h4>
            </section>
        HTML;
    }
}
