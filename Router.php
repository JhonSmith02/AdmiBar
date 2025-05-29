<?php
namespace MVC;

class Router
{
    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->routesPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        //arreglo de rutas protegidas
        $rutas_protegidas = ['/inicio', '/productos/admin', '/productos/create', '/productos/update', '/productos/delete',
        '/proveedores/admin', '/proveedores/create', '/proveedores/update', '/proveedores/delete', '/categorias/admin'];

        $currenUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];


        if($method === 'GET'){
            $fn = $this->routesGET[$currenUrl] ?? null;
        } else {
            $fn = $this->routesPOST[$currenUrl] ?? null;
        }

        //Proteger rutas
        if(in_array($currenUrl, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fn){

            call_user_func($fn, $this);

        } else{
            echo "pagina no encontrada";
        }
    }


    //muestra la vista pero de login
    public function renderPartial($view, $data = []){
        foreach($data as $key => $value){
            $$key = $value;
        }

        include __DIR__ . "/views/$view.php";
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
