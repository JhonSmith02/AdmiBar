<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\ProductoController;

$router = new Router();

$router->get('/admin', [ProductoController::class, 'index']);
$router->get('/productos/create', [ProductoController::class, 'create']);
$router->get('/productos/update', [ProductoController::class, 'update']);

$router->comprobarRutas();