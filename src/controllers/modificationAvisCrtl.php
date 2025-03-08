<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();

$idR = isset($_POST['idR']) ? intval($_POST['idR']) : 0;
$note = isset($_POST['note']) ? intval($_POST['note']) : 0;
$commentaire = isset($_POST['com']) ? trim($_POST['com']) : '';
$idU = $_SESSION['id'];

$updateAvis = $bdd->prepare('UPDATE AVIS SET note = :note, description = :com, dateA = CURRENT_TIMESTAMP WHERE idU = :idU AND idR = :idR');
$updateAvis->bindParam(':idU', $idU, PDO::PARAM_INT);
$updateAvis->bindParam(':idR', $idR, PDO::PARAM_INT);
$updateAvis->bindParam(':note', $note, PDO::PARAM_INT);
$updateAvis->bindParam(':com', $commentaire, PDO::PARAM_STR);
$updateAvis->execute();

header("Location: /page_avis");
exit;
?>
