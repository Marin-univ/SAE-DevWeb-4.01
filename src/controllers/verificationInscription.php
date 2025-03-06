<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$reqType = $bdd->prepare('SELECT * FROM USERS WHERE mailU=:mail');
$reqType->bindParam(":mail", $mail, PDO::PARAM_STR);
$reqType->execute();
$row = $reqType->fetch();

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$mail = $_POST["email"];
$mdp = $_POST["password"];
$user = "user";

$mdpH = password_hash($mdp, PASSWORD_DEFAULT);

if (empty($row)) {
    $insertUser = $bdd->prepare('INSERT INTO USERS (nomU, prenomU, mailU, typeU, mdp) VALUES (:nom,:prenom,:mail,:typeU,:mdp)');
    $insertUser->bindParam(":nom", $nom, PDO::PARAM_STR);
    $insertUser->bindParam(":prenom", $prenom, PDO::PARAM_STR);
    $insertUser->bindParam(":mail", $mail, PDO::PARAM_STR);
    $insertUser->bindParam(":typeU", $user, PDO::PARAM_STR);
    $insertUser->bindParam(":mdp", $mdpH, PDO::PARAM_STR);
    $insertUser->execute();

    $_SESSION["mail"] = $mail;
    header("Location: /connexion");
    exit;
} else {
    $_SESSION["inscription-fail"] = "true";
    header("Location: /inscription");
    exit;
}