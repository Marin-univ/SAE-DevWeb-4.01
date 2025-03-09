<?php
use src\controllers\Database;

$bdd = Database::getMysqlConnection();

$id = $_SESSION["id"];

$supr = $bdd->prepare('DELETE FROM USERS WHERE idU=:id');
$supr->bindParam(":id", $id, PDO::PARAM_INT);
$supr->execute();

session_destroy();

header('Location: /');
exit;