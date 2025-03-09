<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();


$idU = $_SESSION['id'];
$idR = $_POST['idR'];

$query = $bdd->prepare('SELECT * FROM AVIS WHERE idU = :idU AND idR = :idR');
$query->bindParam(':idU', $idU, PDO::PARAM_INT);
$query->bindParam(':idR', $idR, PDO::PARAM_INT);
$query->execute();
$avis = $query->fetch();

if (!$avis) {
    echo "Avis introuvable.";
    exit;
}

$note = htmlspecialchars($avis['note'] ?? 0);
$description = htmlspecialchars($avis['description'] ?? "");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/connexion-inscription.css">
    <title>Modifier Avis</title>
</head>
<body>
    <div class="header">
        <a href="/page_avis">Retour</a>
        <h1>Modifier votre avis</h1>
    </div>
    <div class="content">
        <form class="connexion" method="POST" action="/modifAvisController">
            <input type="hidden" name="idR" value="<?php echo $idR; ?>">
            
            <label for="note">Notes (entre 0 et 5) :</label>
            <input type="number" name="note" id="note" min="0" max="5" value="<?php echo $note; ?>">

            <label for="com">Modifier votre commentaire (255 caractères maximum) :</label>
            <textarea maxlength="255" name="com" id="com" placeholder="commentaire"><?php echo $description; ?></textarea>
            
            <input class="btn-connexion" type="submit" value="Modifier" />
        </form>
    </div>
</body>
</html>
