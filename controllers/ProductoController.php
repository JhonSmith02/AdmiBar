<?php 

namespace Controllers;
use MVC\Router;
use Model\Producto;

class ProductoController{

    public static function index(Router $router){

        $productos = Producto::all();

        $router->render('productos/admin', [
            'productos' => $productos
        ]);
    }

    public static function create(Router $router){

        $producto = new Producto();

        $router->render('productos/crear', [
            'producto' => $producto
        ]);
    }

    public static function update(){
        echo "Actualizando Producto";
    }


}