# IUTables’O - SAE 4.01 Développement Web PHP

## EQUIPE

- Noa FONTENY
- Marin CHESNEAU
- Killian CARRAT
- Jules GRUSON-DELANNOY

## Description du projet

IUTables’O est une application web qui permet de gérer et visualiser des restaurants à Orléans. Ce projet permet aux utilisateurs de rechercher des restaurants, de laisser des critiques, de noter des restaurants et d'accéder à des informations détaillées. Le site propose un module d'authentification pour les utilisateurs et permet de gérer des critiques avec des fonctionnalités étendues pour les utilisateurs enregistrés.

## Fonctionnalités

### Visiteur non authentifié
- Recherche de restaurants.
- Inscription et connexion des utilisateurs.
- Visualisation des restaurant.

### Visiteur enregistré
- Visualisation des notes et critiques laissées par les utilisateurs.
- Gestion de son profil utilisateur (pas de modification).
- Gestion de ses propres critiques (édition et suppression).

## Structure du projet

### Arborescence des fichiers

- **/assets** : Contient les fichiers statiques comme les images, les CSS, les fichiers JavaScript.
- **/controllers** : Contient les fichiers PHP responsables de la logique de contrôle (interaction avec le modèle et les vues).
- **/views** : Contient les vues qui sont rendues pour l'utilisateur (HTML/PHP).

### Technologies utilisées

- PHP, JavaScript, HTML, CSS, SQL
- PDO pour la gestion de la base de données
- Supabase et Mysql (supabase ne marchant pas à l'iut) pour l'authentification et la gestion des données
- Architecture MVC (Modèle-Vue-Contrôleur)
- Autoloading
- Sessions PHP
