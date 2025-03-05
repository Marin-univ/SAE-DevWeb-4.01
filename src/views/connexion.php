<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <header>
    </header>
    <main>
        <form action="/connexion" method="post" action="/verificationConnexion">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Se connecter</button>
            <button type="button" id="toggle-passwords">Afficher</button>
        </form>
    </main>
    <footer>
    </footer>
    <script src="/public/assets/script/affiche_mdp.js"></script>
</body>
</html>