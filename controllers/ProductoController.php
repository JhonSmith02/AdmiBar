<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Proveedor;

class ProductoController{

    public static function index(Router $router){

        $productos = Producto::all();

        $router->render('productos/admin', [
            'productos' => $productos
        ]);
    }

    public static function create(Router $router){

        $producto = new Producto;
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        //array con mensaje de error
        $errors = Producto::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto($_POST);

            $errors = $producto->validate();

            if(empty($errors)){
                $producto->save();
            }

        }

        $router->render('productos/create', [
            'producto' => $producto,
            'categorias' => $categorias,
            'proveedores' => $proveedores,
            'errors' => $errors
        ]);
    }

    public static function update(){
        echo "Actualizando Producto";
    }

}