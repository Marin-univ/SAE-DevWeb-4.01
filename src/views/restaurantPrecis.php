<?php
use src\controllers\Database;
use src\controllers\Restaurant;

$bdd = Database::getMysqlConnection();

if (!isset($_GET['id'])) {
    echo "<p>Restaurant introuvable.</p>";
    exit;
}

$id = intval($_GET['id']);

$query = $bdd->prepare("SELECT idR,typeR,nameR,telephone,website FROM RESTAURANT NATURAL JOIN CONTACT WHERE idR = :id");
$query->bindParam(":id", $id, PDO::PARAM_INT);
$query->execute();
$restaurantData = $query->fetch();

if (!$restaurantData) {
    echo "<p>Restaurant introuvable.</p>";
    exit;
}

$nom = htmlspecialchars($restaurantData['nameR']) ?: "";
$type = htmlspecialchars($restaurantData['typeR']) ?: "";
$phone = htmlspecialchars($restaurantData['telephone'] ?: "Non spécifié");
$website = htmlspecialchars($restaurantData['website'] ?: "Non spécifié");
$estConnecte = isset($_SESSION["id"]);

$restaurant = new Restaurant($id, $type, $nom, $phone, $website);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nom; ?></title>
    <link rel="stylesheet" href="/public/assets/css/restaurantDetails.css">
</head>
<body>

    <header>
        <?php include 'headerAcceuil.php'; ?>
    </header>

    <main>
        <?php echo $restaurant->affichagePrecis($estConnecte, Database::getMysqlConnection()); ?>
    </main>
    
</body>
<?php include('footer.php');?>
</html>
