<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
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
            <button type="button" name="toggle-password" id="toggle-password" class="toggle-password"
                data-target="passwd">afficher</button>
            <?php
            if ($_SESSION['connexion_fail'] === "true") {
                $_SESSION['connexion_fail'] = "";
                echo "<p class='fail'>L'identifiant ou le mot de passe est incorrect</p>";
            }?>
            <input class="btn-connexion" type="submit" value="Se connecter" />
        </form>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const passwordField = document.getElementById(targetId);
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    button.textContent = 'Cacher';
                } else {
                    passwordField.type = 'password';
                    button.textContent = 'Afficher';
                }
            });
        });
    </script>
</body>
</html>