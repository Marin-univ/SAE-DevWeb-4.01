<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <header>
        <?php include('headerAcceuil.php')?>
    </header>
    <main>
        <section id="Plan">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16418.53778744161!2d1.9077983058651669!3d47.9009375843663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1739370159653!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section id="Une">
            <h1>Restaurants à la une</h1>
            <article>
                <img src="" alt="">
                <h2></h2>
            </article>
            <article></article>
            <article></article>
            <article></article>
        </section>
        <?php 
        // Si l'utilisateur est connecté, on affiche ses favoris et ses avis
        if($_SESSION["id"]!=null){
            include('acceuilonnecte.php');
        }
        ?>
    </main>
    <footer>
    </footer>
</body>
</html>