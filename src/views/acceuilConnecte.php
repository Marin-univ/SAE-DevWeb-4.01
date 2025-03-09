<?php
namespace src\views;
use src\controllers\ForYou;
use src\controllers\Favoris;

echo ForYou::affichage();
echo Favoris::affichage();
include('footer.php');
?>
