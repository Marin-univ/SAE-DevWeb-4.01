<!DOCTYPE html lang='fr'>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Favoris</title>
        <link rel="stylesheet" href="/public/assets/css/favoris.css">
    </head>
    <body>
        <?php
            use src\controllers\Database;
            $bdd = Database::getMysqlConnection();

            $mail = $_SESSION["mail"];
            $idU = $_SESSION["id"];

            $fav = $bdd->prepare('SELECT * FROM AIMER NATURAL JOIN RESTAURANT WHERE idU=:id');
            $fav->bindParam(":id", $idU, PDO::PARAM_INT);
            $fav->execute();
            $lesFavoris = $fav->fetchAll();
            
        ?>
        <div class="header">
            <a href="/restaurant/<?php echo htmlspecialchars($idR); ?>">Retour</a>
            <h1>Vos Favoris</h1>
        </div>
        <?php
        if (empty($lesFavoris)) {?>
            <div class=avis>
                <p>Aucun favoris</p>
            </div>
        <?php } else {
         foreach($lesFavoris as $fav){ ?>
            <div class="favoris-container">
                <?php foreach ($lesFavoris as $fav) { ?>
                    <div class="favori-card">
                        <?php $chemin_image="/public/assets/images/" . $fav['typeR'] . ".png"; ?>
                        <img id="image-resto" src="<?php echo htmlspecialchars($chemin_image); ?>" alt="image resto"><div class="favori-info">
                            <h2><?php echo htmlspecialchars($fav['nameR']); ?></h2>
                            <a href="/restaurant/<?php echo htmlspecialchars($fav['idR']); ?>" class="btnVoir">Voir plus</a>

                            <form action="/supprFavoris" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce restaurant de vos favoris ?');">
                            <input type="hidden" name="idR" value="<?php echo $fav['idR']; ?>">
                            <button class="btnAvis" type="submit">Supprimer</button>
                        </div>
                    </form>
                    </div>
            </div>
        <?php }}}?>
    </body>
    <?php include('footer.php');?>
</html>