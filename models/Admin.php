<?php

namespace Model;
use PDO;

class Admin{

    protected static $db;

    protected static $errors = [];

    public $id_usuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $password;

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
        }
    }

    public static function user(){
        $query = "SELECT * FROM usuario";
        $stmt = self::$db->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return array_shift($result) ;
    }

    public function userExists(){
        //Revisamos si el correo existe o no
        $query = "SELECT * FROM usuario WHERE correo = :correo LIMIT 1";

        $stmt = self::$db->prepare($query);

        $stmt->bindValue(':correo', strip_tags(trim($this->correo)), PDO::PARAM_STR);

        $stmt->execute();

        // $user = $stmt->fetch(PDO::FETCH_ASSOC);
         $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        if(!$result){
            self::$errors[] = "El usuario no existe";
            return;
        }
       

        return array_shift($result);
    }

    public function checkPassword($result){
        
        $user = $result;

        $autentificado = password_verify($this->password, $user->password);

        if(!$autentificado){
            self::$errors[] = "La contraseña es incorrecta";
        }
    
        return $autentificado;
    }

    public function autentificar(){
        session_start();

        //llenamos el array de session

        $_SESSION['usuario'] = $this->correo;
        $_SESSION['login'] = true;

        header('Location: /inicio');
    }

    public static function getErrors(){
        return self::$errors;
    }

    public function validate(){
        if(!$this->correo) {
            self::$errors[] = "El correo es obligatorio";
        }

        if(!$this->password){
            self::$errors[] = "El password es obligatorio";
        }

        return self::$errors;
    }
    
}