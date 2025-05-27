<?php

namespace controllers;

use Model\Proveedor;
use MVC\router;


class ProveedorController
{

    public static function index(Router $router)
    {
        $proveedores = Proveedor::all(); //hace un llamado a todos los pro veedores


        $router->render('proveedores/admin', [
            'proveedores' => $proveedores //envia a la vista la informacion para que sea usada
        ]);
    }


    public static function create(Router $router)
    {
        $proveedor = new Proveedor; //Creamos un nuevo objeto de proveedor

        $errors = Proveedor::getErrors(); //Obtenemos los errores de validacion

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Revisamos que los datos que van a ingresar sean por metodo post
            $proveedor = new Proveedor($_POST); //Iniciamos el constructor con los parametros de post

            $errors = $proveedor->validate(); //Validamos la informacion

            if (empty($errors)) {
                $proveedor->create(); //si todo esta bien llamamos el metodo de crear
            }
        }

        $router->render('/proveedores/create', [
            'proveedor' => $proveedor, //Mandamos la informacin a la vista
            'errors' => $errors //Mandamos los errores a la vista
        ]);
    }


    public static function update(Router $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /proveedores/admin');
            exit;
        }

        $proveedor = Proveedor::find($id);
        $errors = Proveedor::getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proveedor->sincronizar($_POST);

            $errors = $proveedor->validate();
            if (empty($errors)) {
                debuguear($proveedor->update());
            }
        }

        $router->render('/proveedores/update', [
            'proveedor' => $proveedor,
            'errors' => $errors
        ]);
    }

    public static function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_proveedor = $_POST['id_proveedor'];
            $id_proveedor = filter_var($id_proveedor, FILTER_VALIDATE_INT);

            if ($id_proveedor) {
                $proveedor = Proveedor::find($id_proveedor);

                $proveedor->delete();
            }
        }
    }
}
