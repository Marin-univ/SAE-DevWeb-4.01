<?php
use src\controllers\Database;
$bdd = Database::getMysqlConnection();


$idU = $_SESSION['id'];
$idR = $_POST['idR'];

$selectAvis = $bdd->prepare('SELECT * FROM AVIS WHERE idU = :idU AND idR = :idR');
$selectAvis->bindParam(':idU', $idU, PDO::PARAM_INT);
$selectAvis->bindParam(':idR', $idR, PDO::PARAM_INT);
$selectAvis->execute();
$avis = $selectAvis->fetch();

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
        <?php if (isset($_POST['resto'])) { ?>
            <a href="/restaurant/<?php echo htmlspecialchars($_POST['idR'] ?? ''); ?>">Retour</a>
        <?php } else { ?>
            <a href="/page_avis">Retour</a>
        <?php }?>
        <h1>Modifier votre avis</h1>
    </div>
    <div class="content">
        <form class="connexion" method="POST" action="/modifAvisController">
            <input type="hidden" name="idR" value="<?php echo $idR; ?>">
            
            <label for="note">Notes (entre 1 et 5) :</label>
            <input type="number" name="note" id="note" min="1" max="5" value="<?php echo $note; ?>">

            <label for="com">Modifier votre commentaire (255 caractères maximum) :</label>
            <textarea maxlength="255" name="com" id="com" placeholder="commentaire"><?php echo $description; ?></textarea>
            
            <input class="btn-connexion" type="submit" value="Modifier" />
        </form>
    </div>
</body>
<?php include('footer.php');?>
</html>
