<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$idR = $_POST['idR'];
$idU = $_SESSION['id'];
$note = $_POST["note"];
$commentaire = $_POST['com'] ?? null;

if (!empty($idR) && !empty($idU) && !empty($note)) {
    $selectAvis = $bdd->prepare('SELECT * FROM AVIS WHERE idU=:idU AND idR=:idR');
    $selectAvis->bindParam(":idU", $idU, PDO::PARAM_INT);
    $selectAvis->bindParam(":idR", $idR, PDO::PARAM_INT);
    $selectAvis->execute();
    $testAvis = $selectAvis->fetch();

    if (empty($testAvis)) {
        $insertAvis = $bdd->prepare('INSERT INTO AVIS VALUES (:idU, :idR, :note, :com)');
        $insertAvis->bindParam(":idU", $idU, PDO::PARAM_INT);
        $insertAvis->bindParam(":idR", $idR, PDO::PARAM_INT);
        $insertAvis->bindParam(":note", $note, PDO::PARAM_INT);
        $insertAvis->bindParam(":com", $commentaire, PDO::PARAM_STR);
        $insertAvis->execute();
    
        header("Location: /");
        exit;
    }
    else {
        $_SESSION["fail-avis"] = "true";
        header("Location: /restaurant/{$idR}/avis");
        exit;
    }
    
} else {
    $_SESSION["fail-avis"] = "true";
    header("Location: /restaurant/{$idR}/avis");
    exit;
}




