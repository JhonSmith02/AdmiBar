<?php

namespace Model;

class Admin{

    protected static $db;

    protected static $errors = [];

    public $id_usuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {

        if(!empty($args)){
            $this->id_usuario = $args['id_usuario'] ?? null;
            $this->nombre = $args['nomobre'] ?? '';
            $this->apellido = $args['apellido'] ?? '';
            $this->correo = $args['correo'] ?? '';
            $this->password = $args['password'] ?? '';
            $this->admin = $args['admin'] ?? null;
            $this->confirmado = $args['confirmado'] ?? null;
            $this->token = $args['token'] ?? '';
        }
    }

    public function save(){

    }
    
}