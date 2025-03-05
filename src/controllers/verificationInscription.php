<?php
use src\controllers\Database;
$bdd = Database::getConnection();

$reqType = $bdd->prepare('SELECT * FROM USER WHERE mailU=:mail');
$reqType->bindParam(":mail", $mail, PDO::PARAM_STR);
$reqType->execute();
$row = $reqType->fetch();

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["email"];
$mdp = $_POST["password"];

if (empty($row)) {
    $insertUser = $bdd->prepare('INSERT INTO USER VALUES (:nom,:prenom,:mail,:typeU,:mdp)');
    $insertUser->bindParam(":nom", $nom, PDO::PARAM_STR);
    $insertUser->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $insertUser->bindParam(":mail", $mail, PDO::PARAM_STR);
    $insertUser->bindParam(":typeU", "user", PDO::PARAM_STR);
    $insertUser->bindParam(":mdp", $mdp, PDO::PARAM_STR);
    $insertUser->execute();

    $_SESSION["mail"] = $mail;
    header("Location: /connexion");
    exit;
} else {
    $_SESSION["inscription-fail"] = "true";
    header("Location: /inscription");
    exit;
}