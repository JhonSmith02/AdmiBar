<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);

            $errors = $auth->validate();

            if(empty($errors)){
                //revisar si el usuario existe
                $result = $auth->userExists();

                if(!$result){
                    $errors = Admin::getErrors();
                }else{
                //verificar password
                   $autentificado = $auth->checkPassword($result);
                   if($autentificado){
                    //autentificar usuario
                    $auth->autentificar();
                   } else{
                    //Password incorrecto mensaje de error
                    $errors = Admin::getErrors();
                   }
                }
            }
        }

        $router->renderPartial('login/login', [
            'errors' => $errors
        ]);
        exit;
    }

    public static function logout(){
        session_start();

        //Limpiamos la session
        $_SESSION = [];

        header('Location: /');
    }
}