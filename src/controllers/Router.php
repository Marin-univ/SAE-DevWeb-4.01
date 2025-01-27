<?php

namespace src\controllers;

class Router
{

    public function handleRequest()
    {
        session_start();
        $data = $_SERVER['REQUEST_URI'];
        $data = str_replace('/PROJET_FI', '', $data);
        $requestUri = explode("?", $data);
        $lesPOST = $requestUri[1];
        $lesPOST = explode(";", $lesPOST);
        

        switch ($requestUri[0]) {
            case '/':
                require_once VIEWS_PATH . '/acceuil.php';
                break;

            case '/inscription':
                require_once VIEWS_PATH . '/inscription.php';
                break;

            case '/connexion':
                require_once VIEWS_PATH . '/connexion.php';
                break;

            default:
                header("Location: /");
                exit;
        }
    }
}