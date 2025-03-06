<?php
$id = $_SESSION["id"];

$supr = $bdd->prepare('DELETE FROM USERS WHERE idU=:id');
$supr->bindParam(":id", $id, PDO::PARAM_STR);
$supr->execute();

session_destroy();

header('Location: /');
exit;