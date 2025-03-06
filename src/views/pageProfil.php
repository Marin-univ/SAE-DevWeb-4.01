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

        ?>
        <div class="header">
            <a href="/">Retour</a>
            <h1>Votre Profil</h1>
        </div>
        <div id=profil>
            <p>Nom : <?php echo htmlspecialchars($lesInfos['nomU'])?></p>
            <p>Prenom : <?php echo htmlspecialchars($lesInfos['prenomU'])?></p>
            <p>mail : <?php echo htmlspecialchars($lesInfos['mailU'])?></p>
            <div class="buttons-container">
                <button id="deco" onclick="window.location.href='/deconnexion'">se deconnecter</button>
                <button id="supr" onclick="window.location.href='/suppressionCompte'">supprimer mon compte</button>
            </div>
        </div>
    </body>
</html>