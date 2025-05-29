<?php 

namespace controllers;
use Model\Categoria;
use MVC\router;
use Model\Admin;

class CategoriaController{

    public static function index(Router $router){
        $categorias = Categoria::all();
        $admin = Admin::user();

        $router->render('/categorias/admin', [
            'categorias' => $categorias,
            'admin' => $admin
        ]);

    }
}