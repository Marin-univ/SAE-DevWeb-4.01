<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/connexion-inscription.css">
    <title>Avis</title>
</head>
<body>
    <div class="header">
        <a href="/restaurant/<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">Retour</a>
        <h1>Laisser votre avis</h1>
    </div>
    <div class="content">
        <form class="connexion" method="POST" action="/insertAvis">
            <input type="hidden" name="idR" value="<?php echo htmlspecialchars($_GET['id'] ?? null); ?>">
            <label for="note">Notes (entre 1 et 5) :</label>
            <input type="number" name="note" id="note" min="1" max="5" value="5">
            <label for="com"> Laisser votre commentaire (255 caractères maximum) :</label>
            <textarea type="textaera" maxlength="255" name="com" id="com" placeholder="commentaire"></textarea>
            <?php
            if (isset($_SESSION['fail-avis'])) {
                if ($_SESSION['fail-avis'] === "true") {
                    $_SESSION['fail-avis'] = "";
                    echo "<p class='fail'>Erreur lors de l'enregistrement</p>";
                }
            }?>
            <input class="btn-connexion" type="submit" value="enregistrer" />
        </form>
    </div>
</body>
<?php include('footer.php');?>
</html>