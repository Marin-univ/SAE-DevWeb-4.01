<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$mail = $_POST['mail'];
$mdp_code = $_POST['passwd'];

$reqType = $bdd->prepare('SELECT * FROM USERS WHERE mailU=:mail');
$reqType->bindParam(":mail", $mail, PDO::PARAM_STR);
$reqType->execute();
$row = $reqType->fetch();
$id = $row["idU"];
$type = $row["typeU"];
$bd_mdp = $row["mdp"];

print_r($mdp_code);
print_r($bd_mdp);

if (password_verify($mdp_code, $bd_mdp) && !empty($row)) {
    $_SESSION["mail"] = $mail;
    $_SESSION["id"] = $mail;
    header('Location: /');
    exit;
} else {
    $_SESSION["connexion-fail"] = "true";
    header('Location: /connexion');
    exit;
}