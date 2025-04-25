<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$database = new database();
$db = $database->getConnection();

use App\Producto;

Producto::setDB($db);


