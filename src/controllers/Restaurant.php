<?php 
namespace src\controllers;

use PDO;

class Restaurant{
    public $id;
    public $type;
    public $nom;
    public $phone;
    public $website;

    public function __construct($id, $type, $nom, $phone, $website) {
        $this->id = $id;
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
                <a href="/restaurant/{$this->id}" class="btn-details">Voir plus</a>
            </section>
        HTML;
    }

    public function affichagePrecis($estConnecte, $bdd) {
        $chemin_image = "/public/assets/images/" . $this->type . ".png";
        $boutons = "";

        $selectAvis = $bdd->prepare('SELECT * FROM AVIS WHERE idU=:idU AND idR=:idR');
        $selectAvis->bindParam(":idU", $_SESSION["id"], PDO::PARAM_INT);
        $selectAvis->bindParam(":idR", $this->id, PDO::PARAM_INT);
        $selectAvis->execute();
        $testAvis = $selectAvis->fetch();

        $testPresent = isset($testAvis['idU']) && isset($testAvis['idR']);

        if ($estConnecte && !$testPresent) {
            $boutons = <<<HTML
                <div class="btn-container">
                    <a href="/restaurant/{$this->id}/avis" class="btn-avis">Laisser un avis</a>
                    <a href="/restaurant/{$this->id}/favoris" class="btn-favoris">Ajouter aux favoris</a>
                </div>
            HTML;
        } elseif ($estConnecte && $testPresent) {
            $boutons = <<<HTML
                <div class="btn-container">
                    <a href="/page_avis" class="btn-avis">Modifier mon avis</a>
                    <a href="/restaurant/{$this->id}/favoris" class="btn-favoris">Ajouter aux favoris</a>
                </div>
            HTML;
        }

        return <<<HTML
            <link rel="stylesheet" href="/public/assets/css/restaurantUnique.css">
            <section id="section-detail-resto">
                <img id="image-resto" src="{$chemin_image}" alt="image du restaurant">
                <div class="infos-resto">
                    <h2 class="nom-resto">{$this->nom}</h2>
                    <p class="info-resto">Type: {$this->type}</p>
                    <p class="info-resto">Téléphone: {$this->phone}</p>
                    <p class="info-resto">Site web: <a href="{$this->website}" target="_blank">{$this->website}</a></p>
                    {$boutons}
                </div>
            </section>
        HTML;
    }
}
