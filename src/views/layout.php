<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Application PHP MVC</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenue dans mon application PHP MVC</h1>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/users">Utilisateurs</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php include $view; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Mon Application. Tous droits réservés.</p>
    </footer>
</body>
</html>