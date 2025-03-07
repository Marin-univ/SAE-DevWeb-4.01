<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$idR = $_POST['idR'];
$idU = $_SESSION['id'];
$note = $_POST["note"];
$commentaire = $_POST['com'] ?? null;

if (!empty($idR) && !empty($idU) && !empty($note)) {
    $insertAvis = $bdd->prepare('INSERT INTO AVIS VALUES (:idU, :idR, :note, :com)');
    $insertAvis->bindParam(":idU", $idU, PDO::PARAM_INT);
    $insertAvis->bindParam(":idR", $idR, PDO::PARAM_INT);
    $insertAvis->bindParam(":note", $note, PDO::PARAM_INT);
    $insertAvis->bindParam(":com", $commentaire, PDO::PARAM_STR);
    $insertAvis->execute();

    header("Location: /");
    exit;
} else {
    $_SESSION["fail-avis"] = "true";
    header("Location: /AvisRestaurant");
    exit;
}




