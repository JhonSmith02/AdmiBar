<?php

require '../../includes/app.php';

use Model\Producto;

//Conexion a la base de datos
$db = new database();
$dbc = $db->getConnection();

//Validacion ara verificar el metodo de envio de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $producto = new Producto($_POST);

    $errors = $producto->validate();

    if (empty($errors)) {
        $producto->save();
    } else{
        header('Location: ../index.php');
    }

    // debuguear($producto::getErrors());

    // $producto::all();

    // debuguear($producto);
}
