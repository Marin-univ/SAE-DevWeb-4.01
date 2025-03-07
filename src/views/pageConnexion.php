<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/assets/css/connexion-inscription.css">
    <title>Connexion</title>
</head>

<body>
    <div class="header">
        <a href="/">Retour</a>
        <h1>Se connecter</h1>
    </div>
    <div class="content">

        <form class="connexion" method="POST" action="verfiCo">
            <input type="email" name="mail" id="ident" placeholder="Mail" required/>
            <input type="password" name="passwd" id="passwd" placeholder="Mot de passe" required/>
            <button type="button" name="toggle-password" id="new-passwd" class="toggle-password">afficher</button>
            <?php
            if (isset($_SESSION['connexion-fail'])) {
                if ($_SESSION['connexion-fail'] === "true") {
                    $_SESSION['connexion-fail'] = "";
                    echo "<p class='fail'>L'identifiant ou le mot de passe est incorrect</p>";
                }
            }?>
            <input class="btn-connexion" type="submit" value="Se connecter" />
        </form>
    </div>
    <script src="../../public/assets/js/affiche_mdp.js"></script>
</body>
</html>