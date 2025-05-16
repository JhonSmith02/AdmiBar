<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ProductoController;
use Controllers\ProveedorController;


$router = new Router();

$router->get('/', []);

$router->get('/productos/admin', [ProductoController::class, 'index']);
$router->get('/productos/create', [ProductoController::class, 'create']);
$router->post('/productos/create', [ProductoController::class, 'create']);
$router->get('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/delete', [ProductoController::class, 'delete']);


$router->get('/proveedor/admin', [ProveedorController::class, 'index']);

//Login y Autentificacion


$router->comprobarRutas();