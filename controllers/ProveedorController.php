<?php

namespace controllers;
use Model\Proveedor;
use MVC\router;


class ProveedorController{

    public static function index(Router $router){
        $proveedores = Proveedor::all();
        

        $router->render('proveedores/admin',[
            'proveedores' => $proveedores
        ]);
    }



}