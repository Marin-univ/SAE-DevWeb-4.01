<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../../public/assets/css/connexion-inscription.css">
</head>
<body>
    <header>
    <div class="header">
        <a href="/">Retour</a>
        <h1>Inscription</h1>
    </div>
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
            <input type="password" name="password" id="new-passwd" required>
            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm-passwd" required>
            <button type="button" name="toggle-password" id="toggle-all-passwords" class="toggle-password">afficher</button>
            <button class="btn-inscription" type="submit">S'inscrire</button>
        </form>
    </main>
    <script src="../../public/assets/js/affiche_mdp.js"></script>
</body>
</html>