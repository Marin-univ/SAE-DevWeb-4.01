<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/connexion-inscription.css">
    <title>Avis</title>
</head>
<body>
    <?php
    include('headerAcceuil.php');
    ?>
    <div class="header">
        <h1>Laisser votre avis</h1>
    </div>
    <div class="content">
        <form class="connexion" method="POST" action="insertAvis">
            <input type="hidden" id="idR" value="<?php $_POST["idR"]; ?>">
            <label for="note">Notes (entre 0 et 5) :</label>
            <input type="number" id="note" min="0" max="5" value="0">
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
</html>