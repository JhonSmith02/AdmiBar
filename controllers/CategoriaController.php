<?php 

namespace controllers;
use Model\Categoria;
use MVC\router;


class CategoriaController{

    public static function index(Router $router){
        $categorias = Categoria::all();

        $router->render('/categorias/admin', [
            'categorias' => $categorias
        ]);

    }
}