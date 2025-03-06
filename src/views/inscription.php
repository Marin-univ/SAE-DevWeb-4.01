<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <header>
    </header>
    <main>
        <form method="post" action="/verfiInscription">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" required>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <button type="submit">S'inscrire</button>
            <button type="button" id="toggle-passwords">Afficher</button>
        </form>
    </main>
    <footer>
    </footer>
    <script src="/public/assets/script/affiche_mdp.js"></script>
</body>
</html>