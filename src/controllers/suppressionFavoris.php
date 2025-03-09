<?php
use src\controllers\Database;

$bdd = Database::getMysqlConnection();

if (isset($_POST['idR'])) {
    $idU = intval($_SESSION['id']);
    $idR = intval($_POST['idR']);

    $deleteAvis = $bdd->prepare('DELETE FROM AIMER WHERE idU = :idU AND idR = :idR');
    $deleteAvis->bindParam(':idU', $idU, PDO::PARAM_INT);
    $deleteAvis->bindParam(':idR', $idR, PDO::PARAM_INT);
    $deleteAvis->execute();

    if (isset($_POST['resto'])) {
        header("Location: /restaurant/" . htmlspecialchars($idR));
        exit;
    } else {
        header("Location: /page_favoris");
        exit;
    }
}

echo "Erreur : Requête invalide.";
?>
