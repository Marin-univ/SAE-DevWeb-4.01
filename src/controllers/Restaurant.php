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
        $testPresentAvis = isset($testAvis['idU']) && isset($testAvis['idR']);
    
        $selectFavoris = $bdd->prepare('SELECT * FROM AIMER WHERE idU=:idU AND idR=:idR');
        $selectFavoris->bindParam(":idU", $_SESSION["id"], PDO::PARAM_INT);
        $selectFavoris->bindParam(":idR", $this->id, PDO::PARAM_INT);
        $selectFavoris->execute();
        $testFavoris = $selectFavoris->fetch();
        $testPresentFavoris = isset($testFavoris['idU']) && isset($testFavoris['idR']);
    
        if ($estConnecte && !$testPresentAvis) {
            $boutonsAvis = <<<HTML
                <form action="/restaurant/{$this->id}/avis" method="POST">
                    <button type="submit" class="btn-avis">Laisser un avis</button>
                </form>
            HTML;
        } elseif ($estConnecte && $testPresentAvis) {
            $boutonsAvis = <<<HTML
                <form action="/modifAvis" method="POST">
                    <input type="hidden" name="idR" id="idR" value="{$this->id}">
                    <input type="hidden" name="resto" id="resto" value="resto">
                    <button type="submit" class="btn-avis">Modifier mon avis</button>
                </form>
            HTML;
        } else {
            $boutonsAvis = "";
        }
    
        if ($estConnecte) {
            if ($testPresentFavoris) {
                $boutonsFavoris = <<<HTML
                    <form action="/supprFavoris" method="POST">
                        <input type="hidden" name="idR" id="idR" value="{$this->id}">
                        <input type="hidden" name="resto" id="resto" value="resto">
                        <button type="submit" class="btn-favoris remove">Supprimer des favoris</button>
                    </form>
                HTML;
            } else {
                $boutonsFavoris = <<<HTML
                    <form action="/insertFavoris" method="POST">
                        <input type="hidden" name="idR" id="idR" value="{$this->id}">
                        <button type="submit" class="btn-favoris">Ajouter aux favoris</button>
                    </form>
                HTML;
            }
        } else {
            $boutonsFavoris = "";
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
                    <div class="btn-container">
                        {$boutonsAvis}
                        {$boutonsFavoris}
                    </div>
                </div>
            </section>
        HTML;
    }
}    