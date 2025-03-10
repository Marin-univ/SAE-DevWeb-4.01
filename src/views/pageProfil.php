<!DOCTYPE html lang='fr'>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profil</title>
        <link rel="stylesheet" href="../../public/assets/css/profil.css">
    </head>
    <body>
        <?php

            use src\controllers\Database;
            $bdd = Database::getMysqlConnection();

            $id = $_SESSION["id"];

            $InfoUser = $bdd->prepare('SELECT * FROM USERS WHERE idU=:id');
            $InfoUser->bindParam(":id", $id, PDO::PARAM_STR);
            $InfoUser->execute();
            $lesInfos  = $InfoUser->fetch();

            include('headerAcceuil.php');
        ?>
        <div class="header">
            <h1>Votre Profil</h1>
        </div>
        <div id=profil>
            <p>Nom : <?php echo htmlspecialchars($lesInfos['nomU'])?></p>
            <p>Prenom : <?php echo htmlspecialchars($lesInfos['prenomU'])?></p>
            <p>mail : <?php echo htmlspecialchars($lesInfos['mailU'])?></p>
            <div class="buttons-container">
                <button id="deco" onclick="window.location.href='/deconnexion'">se deconnecter</button>
                <form action="/SuppressionCompte" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.')">
                    <button type="submit" id="supr">Supprimer mon compte</button>
                </form>
            </div>
        </div>
    </body>
    <?php include('footer.php');?>
</html>