<?php

namespace src\controllers;

class Router
{

    public function handleRequest()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');

        if (preg_match('#^restaurant/([0-9]+)$#', $uri, $matches)) {
            $_GET['id'] = $matches[1];
            require_once VIEWS_PATH . '/restaurantPrecis.php';
            return;
        }

        if (preg_match('#^restaurant/([0-9]+)/avis$#', $uri, $matches)) {
            $_GET['id'] = $matches[1];
            require_once VIEWS_PATH . '/laisserAvis.php'; 
            return;
        }
    
        if (preg_match('#^restaurant/([0-9]+)/favoris$#', $uri, $matches)) {
            $_GET['id'] = $matches[1];
            require_once VIEWS_PATH . '/favorisRestaurant.php'; 
            return;
        }
    
        switch ($_SERVER['REQUEST_URI']) {
            case '/':
                require_once VIEWS_PATH . '/acceuil.php';
                break;

            case '/inscription':
                require_once VIEWS_PATH . '/inscription.php';
                break;

            case '/connexion':
                require_once VIEWS_PATH . '/pageConnexion.php';
                break;

            case '/verfiCo':
                require_once CONTROLLERS_PATH . '/verificationConnexion.php';
                break;

            case '/verfiInscription':
                require_once CONTROLLERS_PATH . '/verificationInscription.php';
                break;

            case '/deconnexion':
                require_once CONTROLLERS_PATH . '/deco.php';
                break;

            case '/SuppressionCompte':
                require_once CONTROLLERS_PATH . '/suppressionCompte.php';
                break;

            case '/insertAvis':
                require_once CONTROLLERS_PATH . '/insertAvis.php';
                break;

            case '/insertFavoris':
                require_once CONTROLLERS_PATH . '/insertFavoris.php';
                break;
            
            case '/AvisRestaurant':
                require_once VIEWS_PATH . '/laisserAvis.php';
                break;

            case '/page_avis':
                require_once VIEWS_PATH . '/pageAvis.php';
                break;
            
            case '/page_favoris':
                require_once VIEWS_PATH . '/pageFavoris.php';
                break;

            case '/page_profil':
                require_once VIEWS_PATH . '/pageProfil.php';
                break;

            case '/supprAvis':
                require_once CONTROLLERS_PATH . '/suppressionAvis.php';
                break;

            case '/supprFavoris':
                require_once CONTROLLERS_PATH . '/suppressionFavoris.php';
                break;

            case '/modifAvis':
                require_once VIEWS_PATH . '/modificationAvis.php';
                break;

            case '/modifAvisController':
                require_once CONTROLLERS_PATH . '/modificationAvisCrtl.php';
                break;

            default:
                header("Location: /");
                exit;
        }
    }
}