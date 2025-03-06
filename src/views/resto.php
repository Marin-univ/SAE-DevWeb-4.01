<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['restaurant'])) {
    $restaurant = json_decode($_POST['restaurant'], true);
} else {
    die("no data recieved");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($restaurant['name'] ?? "Restaurant"); ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: auto; }
        h1 { color: #333; }
        .info { margin-bottom: 10px; }
        .map { height: 300px; margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($restaurant['name'] ?? "Nom inconnu"); ?></h1>
    <p class="info"><strong>Type :</strong> <?php echo htmlspecialchars($restaurant['type'] ?? "Non renseigné"); ?></p>
    <p class="info"><strong>Horaires :</strong> <?php echo htmlspecialchars($restaurant['opening_hours'] ?? "Non renseigné"); ?></p>
    <p class="info"><strong>Adresse :</strong> <?php echo htmlspecialchars($restaurant['commune'] ?? "Lieu inconnu"); ?>, <?php echo htmlspecialchars($restaurant['departement'] ?? "Département inconnu"); ?>, <?php echo htmlspecialchars($restaurant['region'] ?? "Région inconnue"); ?></p>
    
    <?php if (!empty($restaurant['website'])): ?>
        <p class="info"><strong>Site web :</strong> <a href="<?php echo htmlspecialchars($restaurant['website']); ?>" target="_blank"><?php echo htmlspecialchars($restaurant['website']); ?></a></p>
    <?php endif; ?>

    <p class="info"><strong>Voir sur la carte :</strong> <a href="https://www.openstreetmap.org/?mlat=<?php echo $restaurant['geo_point_2d']['lat']; ?>&mlon=<?php echo $restaurant['geo_point_2d']['lon']; ?>" target="_blank">OpenStreetMap</a></p>

    <div id="map" class="map"></div>
</div>

</body>
</html>