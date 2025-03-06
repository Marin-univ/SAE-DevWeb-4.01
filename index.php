<?php
require_once __DIR__ . '/src/config/config.php';
require_once __DIR__ . '/src/config/Autoloader.php';

use src\config\Autoloader;
use src\controllers\GestionJSON;
use src\controllers\Router;
use src\controllers\Database;

session_start();

Autoloader::register();
$chargerJSON = new GestionJSON();

$router = new Router();
$router->handleRequest();