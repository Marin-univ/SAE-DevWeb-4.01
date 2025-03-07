<?php

namespace src\controllers;

class Restaurant{
    public $type;
    public $nom;
    public $phone;
    public $website;


    public function affichage(){
        $chemin_image="/public/assets/images/" . $this->type;
        return <<<HTML
            <section>
                <img src="{$chemin_image}" alt="image resto">
            </section>
            <section>
                <h3>$this->nom</h3>
            </section>
        HTML;
    }
}
