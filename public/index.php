<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ProductoController;
use Controllers\ProveedorController;
use Controllers\CategoriaController;


$router = new Router();

$router->get('/', []);

$router->get('/productos/admin', [ProductoController::class, 'index']);
$router->get('/productos/create', [ProductoController::class, 'create']);
$router->post('/productos/create', [ProductoController::class, 'create']);
$router->get('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/delete', [ProductoController::class, 'delete']);


$router->get('/proveedores/admin', [ProveedorController::class, 'index']);
$router->get('/proveedores/create', [ProveedorController::class, 'create']);
$router->post('/proveedores/create', [ProveedorController::class, 'create']);
$router->get('/proveedores/update', [ProveedorController::class, 'update']);
$router->post('/proveedores/update', [ProveedorController::class, 'update']);
$router->post('/proveedores/delete', [ProveedorController::class, 'delete']);


$router->get('/categorias/admin', [CategoriaController::class, 'index']);

//Login y Autentificacion


$router->comprobarRutas();