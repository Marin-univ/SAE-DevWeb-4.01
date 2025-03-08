<!DOCTYPE html lang='fr'>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Avis</title>
        <link rel="stylesheet" href="../../public/assets/css/avis.css">
    </head>
    <body>
        <?php
            use src\controllers\Database;
            $bdd = Database::getMysqlConnection();

            $mail = $_SESSION["mail"];
            $idU = $_SESSION["id"];

            $Avis = $bdd->prepare('SELECT * FROM AVIS NATURAL JOIN RESTAURANT WHERE idU=:id');
            $Avis->bindParam(":id", $idU, PDO::PARAM_STR);
            $Avis->execute();
            $lesAvis = $Avis->fetchAll();
        ?>
        <div class="header">
            <a href="/">Retour</a>
            <h1>Vos Avis</h1>
        </div>
        <?php
        if (empty($lesAvis)) {?>
            <div id=avis>
                <p>Aucun avis disponible</p>
            </div>
        <?php } else {
         foreach($lesAvis as $avis){ ?>
            <div id=avis>
                <p>Avis sur le restaurant : <?php echo htmlspecialchars($avis['nameR'])?></p>
                <p><?php echo htmlspecialchars($avis['note'])?>/5</p>
                <?php if (is_null($avis['description'])) {?>
                    <p>Aucun commentaire.</p><?php
                } else { ?>
                    <p><?php echo htmlspecialchars($avis['description'])?></p>
                <?php }?>
            </div>
        <?php }}?>
    </body>
</html>