<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$idR = $_POST['idR'];
$idU = $_SESSION['id'];

if (!empty($idR) && !empty($idU)) {
    $selectFav = $bdd->prepare('SELECT * FROM AIMER WHERE idU=:idU AND idR=:idR');
    $selectFav->bindParam(":idU", $idU, PDO::PARAM_INT);
    $selectFav->bindParam(":idR", $idR, PDO::PARAM_INT);
    $selectFav->execute();
    $testFav = $selectFav->fetch();

    if (empty($testAvis)) {
        $insertAvis = $bdd->prepare('INSERT INTO AIMER (idU, idR) VALUES (:idU, :idR)');
        $insertAvis->bindParam(":idU", $idU, PDO::PARAM_INT);
        $insertAvis->bindParam(":idR", $idR, PDO::PARAM_INT);
        $insertAvis->execute();
    
        header("Location: /restaurant/" . htmlspecialchars($idR));
        exit;
    }

} else {
    header("Location: /");
        exit;
}



