<?php

namespace MVC;

class Router
{
    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }

    public function comprobarRutas() {
        $currenUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $fn = $this->routesGET[$currenUrl] ?? null;
        }

        if($fn){

            call_user_func($fn, $this);

        } else{
            echo "pagina no encontrada";
        }
    }


    //Muestra una vista
    public function render($view, $data = []){

        foreach($data as $key => $value){
            $$key = $value;
        }
        
        ob_start(); //Guarda la siguiente linea en memoria
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); //Limpiamos la memoria que habiamos llenado

        include __DIR__ . "/views/layout.php";
    }
}
