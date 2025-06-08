<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Proveedor;
use Model\Admin;
class ProductoController{

    public static function index(Router $router){

        $productos = Producto::all();
        $admin = Admin::user();

        $router->render('productos/admin', [
            'productos' => $productos,
            'admin' => $admin
        ]);
    }

    public static function create(Router $router){

        $producto = new Producto;
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        $admin = Admin::user();
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
            'admin' => $admin,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router){
        //Revisa que el id sea valido
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin');
            exit;
        }

        $producto = Producto::find($id);
        $errors = Producto::getErrors();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        $admin = Admin::user();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $producto->sincronizar($_POST);

            $errors = $producto->validate();

            if(empty($errors)){
                $producto->update();
            }
        }
        
        $router->render('productos/update', [
            'producto' => $producto,
            'errors' => $errors,
            'categorias' => $categorias,
            'proveedores' => $proveedores,
            'admin' => $admin
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id_producto = $_POST['id_producto'];
            $id_producto = filter_var($id_producto, FILTER_VALIDATE_INT);

            if($id_producto){
                $producto = Producto::find($id_producto);

                // debuguear($producto);
                $producto->delete();
            }
        }
    }
}