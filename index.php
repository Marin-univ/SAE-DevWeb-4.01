<?php
require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Controllers\HomeController;

$controller = new HomeController();

$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/') {
    $controller->index();
} elseif (preg_match('/^\/user\/(\d+)$/', $requestUri, $matches)) {
    $controller->show($matches[1]);
} else {
    http_response_code(404);
    echo '404 Not Found';
}
?>