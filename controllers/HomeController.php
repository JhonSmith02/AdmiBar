<?php

namespace Controllers;
use Model\Admin;
use MVC\Router;

class HomeController{
    public static function index(Router $router){
        
        $admin = Admin::user();

        $router->renderPartial('layout', [
            'admin' => $admin
        ]);
    }
}