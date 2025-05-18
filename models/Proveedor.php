<?php

namespace Model;
use PDO;

class Proveedor
{
    protected static $db;

    protected static $errors = [];

    public $id_proveedor;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $descripcion;

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        if (!empty($args)) {
            $this->id_proveedor = $args['id_proveedor'] ?? '';
            $this->nombre = $args['nombre'] ?? '';
            $this->apellido = $args['apellido'] ?? '';
            $this->telefono = $args['telefono'] ?? '';
            $this->correo = $args['correo'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
        }
    }

    public function create() {
        $query = "INSERT INTO proveedor (nombre, apellido, telefono, correo, descripcion) 
        VALUES (:nombre, :apellido, :telefono, :correo, :descripcion)";

        $stmt = self::$db->prepare($query);

        $stmt->bindValue(':nombre', strip_tags(trim($this->nombre)), PDO::PARAM_STR);
        $stmt->bindValue(':apellido', strip_tags(trim($this->apellido)), PDO::PARAM_STR);
        $stmt->bindValue(':telefono', strip_tags(trim($this->telefono)), PDO::PARAM_STR);
        $stmt->bindValue(':correo', strip_tags(trim($this->correo)), PDO::PARAM_STR);
        $stmt->bindValue('descripcion', strip_tags(trim($this->descripcion)), PDO::PARAM_STR);

        $result = $stmt->execute();

        if($result){
            header('Location: /proveedores/create?msg=1');
            exit;
        }
    }

    public function update(){
        $query = "UPDATE proveedor SET nombre = :nombre, apellido = :apellido, telefono = :telefono, correo = :correo, descripcion = :descripcion
        WHERE id_proveedor = :id_proveedor";

        $stmt = self::$db->prepare($query);

        $stmt->bindValue(':nombre', strip_tags(trim($this->nombre)), PDO::PARAM_STR);
        $stmt->bindValue(':apellido', strip_tags(trim($this->apellido)), PDO::PARAM_STR);
        $stmt->bindValue(':telefono', strip_tags(trim($this->telefono)), PDO::PARAM_STR);
        $stmt->bindValue(':correo', strip_tags(trim($this->correo)), PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', strip_tags(trim($this->descripcion)), PDO::PARAM_STR);
        $stmt->bindValue(':id_proveedor', intval($this->id_proveedor), PDO::PARAM_INT);

        $result = $stmt->execute();

        if($result){
            header('Location: /proveedores/admin?msg=2');
            exit;
        }
    }

    public static function find($id){
        $query ="SELECT * FROM proveedor WHERE id_proveedor = :id_proveedor";
        $stmt = self::$db->prepare($query);

        $stmt->bindValue(':id_proveedor', intval($id), PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);

        return array_shift($result);
    }

    public function delete(){
        $query = "DELETE FROM proveedor WHERE id_proveedor = :id_proveedor";

        $stmt = self::$db->prepare($query);

        $stmt->bindValue(':id_proveedor', intval($this->id_proveedor));

        $result = $stmt->execute();

        if($result){
            header('Location: /proveedores/admin?msg=3');
        }
    }
    
     //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public static function all()
    {
        $query = "SELECT * FROM proveedor";
        $stmt = self::$db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getErrors(){
        return self::$errors;
    }

    public function validate(){
        if (!$this->nombre) {
            self::$errors[] = "Debes agrebar un nombre";
        }

        if(!$this->apellido){
            self::$errors[] = "Debes agregar un apellido";
        }

        if(!$this->telefono){
            self::$errors[] = "Debes agregar un telefono";
        }

        if(!$this->correo){
            self::$errors[] = "Debes agregar un correo";
        }

        if(!$this->descripcion){
            self::$errors[] = "Debes agregar una descripcion";
        }

        return self::$errors;
    }

}
