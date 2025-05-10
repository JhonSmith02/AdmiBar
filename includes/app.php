<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$database = new database();
$db = $database->getConnection();

use Model\Producto;
use Model\Categoria;
use Model\Proveedor;

Producto::setDB($db);
Categoria::setDB($db);
Proveedor::setDB($db);