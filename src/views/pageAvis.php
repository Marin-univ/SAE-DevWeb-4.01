<!DOCTYPE html lang='fr'>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Avis</title>
        <link rel="stylesheet" href="/public/assets/css/avis.css">
    </head>
    <body>
        <?php
            use src\controllers\Database;
            $bdd = Database::getMysqlConnection();

            $mail = $_SESSION["mail"];
            $idU = $_SESSION["id"];

            $Avis = $bdd->prepare('SELECT * FROM AVIS NATURAL JOIN RESTAURANT WHERE idU=:id ORDER BY dateA');
            $Avis->bindParam(":id", $idU, PDO::PARAM_STR);
            $Avis->execute();
            $lesAvis = $Avis->fetchAll();
            
        ?>
        <div class="header">
            <a href="/restaurant/<?php echo htmlspecialchars($idR); ?>">Retour</a>
            <h1>Vos Avis</h1>
        </div>
        <?php
        if (empty($lesAvis)) {?>
            <div class=avis>
                <p>Aucun avis disponible</p>
            </div>
        <?php } else {
         foreach($lesAvis as $avis){ ?>
            <div class=avis>
                <p>Avis sur le restaurant : <?php echo htmlspecialchars($avis['nameR'])?></p>
                <p><?php echo htmlspecialchars($avis['note'])?>/5</p>
                <?php if (is_null($avis['description'])) {?>
                    <p>Aucun commentaire.</p><?php
                } else { ?>
                    <p><?php echo htmlspecialchars($avis['description'])?></p>
                <?php }?>
                <form action="/modifAvis" method="POST">
                    <input type="hidden" name="idU" value="<?php echo $idU; ?>">
                    <input type="hidden" name="idR" value="<?php echo $avis['idR']; ?>">
                    <button class="btnAvis" type="submit">Modifier</button>
                </form>

                <form action="/supprAvis" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet avis ?');">
                    <input type="hidden" name="idU" value="<?php echo $idU; ?>">
                    <input type="hidden" name="idR" value="<?php echo $avis['idR']; ?>">
                    <button class="btnAvis" type="submit">Supprimer</button>
                </form>
            </div>
        <?php }}?>
    </body>
    <?php include('footer.php');?>
</html> 