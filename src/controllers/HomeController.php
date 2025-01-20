<?php

namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        // Afficher la vue d'accueil
        require_once '../app/Views/home.php';
    }

    public function show($id)
    {
        // Récupérer l'utilisateur par son identifiant
        $user = new User();
        $userData = $user->find($id);
        
        // Afficher les informations de l'utilisateur
        require_once '../app/Views/user.php'; // Assurez-vous d'avoir une vue pour afficher l'utilisateur
    }
}