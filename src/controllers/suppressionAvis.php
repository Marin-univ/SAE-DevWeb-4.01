<?php
use src\controllers\Database;

$bdd = Database::getMysqlConnection();

if (isset($_POST['idU'], $_POST['idR'])) {
    $idU = intval($_POST['idU']);
    $idR = intval($_POST['idR']);

    $deleteAvis = $bdd->prepare('DELETE FROM AVIS WHERE idU = :idU AND idR = :idR');
    $deleteAvis->bindParam(':idU', $idU, PDO::PARAM_INT);
    $deleteAvis->bindParam(':idR', $idR, PDO::PARAM_INT);
    $deleteAvis->execute();

    header("Location: /page_avis");
    exit;
}

echo "Erreur : Requête invalide.";
?>
