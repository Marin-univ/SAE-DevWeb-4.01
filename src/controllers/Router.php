<?php

namespace src\controllers;

class Router
{

    public function handleRequest()
    {

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

            default:
                header("Location: /");
                exit;
        }
    }
}