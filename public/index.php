<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ProductoController;

$router = new Router();



$router->get('/admin', [ProductoController::class, 'index']);
$router->get('/productos', [ProductoController::class, 'create']);
$router->get('/', []);

$router->comprobarRutas();