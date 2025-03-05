<?php
use src\controllers\Database;
$bdd = Database::getConnection();

$mail = $_POST['mail'];
$mdp_code = $_POST['passwd'];

$reqType = $bdd->prepare('SELECT * FROM USER WHERE mailU=:mail');
$reqType->bindParam(":mail", $mail, PDO::PARAM_STR);
$reqType->execute();
$row = $reqType->fetch();
$type = $row["typeU"];
$bd_mdp = $row["mdp"];

if (password_verify($mdp_code, $bd_mdp) && !empty($row)) {
    $_SESSION["mail"] = $mail;
    header('Location: /');
    exit;
} else {
    $_SESSION["connexion-fail"] = "true";
    header('Location: /connexion');
    exit;
}