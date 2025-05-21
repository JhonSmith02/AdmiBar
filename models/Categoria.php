<?php

namespace Model;
use PDO;
class Categoria{
    //Base de datos
    protected static $db;

    //Validaciones
    protected static $errors = [];

    //Atributos
    public $id_categoria;
    public $nombre;
    public $descripcion;

    public static function setDB($database){
        self::$db = $database;
    }


    public function __construct($args = [])
    {
        if(!empty($args)){
            $this->id_categoria = $args['id_categoria'] ?? '';
            $this->nombre = $args['nombre'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
        }
    }

    public function save(){
        $query = "SELECT * FROM categoria";

        $stmt = self::$db->prepare($query);

    }

    public static function all(){
        $query = "SELECT * FROM categoria";
        $stmt = self::$db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}