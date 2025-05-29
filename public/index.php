<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use MVC\Router;
use Controllers\ProductoController;
use Controllers\ProveedorController;
use Controllers\CategoriaController;
use Controllers\HomeController;
use Controllers\LoginController;

$router = new Router();

//Api Productos
$router->get('/api/productos', [APIController::class, 'index']);

//Runa por defecto
$router->get('/', [LoginController::class, 'login']);

//Inicio
$router->get('/inicio', [HomeController::class, 'index']);

//Rutas productos
$router->get('/productos/admin', [ProductoController::class, 'index']);
$router->get('/productos/create', [ProductoController::class, 'create']);
$router->post('/productos/create', [ProductoController::class, 'create']);
$router->get('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/update', [ProductoController::class, 'update']);
$router->post('/productos/delete', [ProductoController::class, 'delete']);

//Rutas proveedores
$router->get('/proveedores/admin', [ProveedorController::class, 'index']);
$router->get('/proveedores/create', [ProveedorController::class, 'create']);
$router->post('/proveedores/create', [ProveedorController::class, 'create']);
$router->get('/proveedores/update', [ProveedorController::class, 'update']);
$router->post('/proveedores/update', [ProveedorController::class, 'update']);
$router->post('/proveedores/delete', [ProveedorController::class, 'delete']);

//Rutas categorias
$router->get('/categorias/admin', [CategoriaController::class, 'index']);

//Login y Autentificacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



$router->comprobarRutas();