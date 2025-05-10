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

    public function save() {

    }

    public static function all()
    {
        $query = "SELECT * FROM proveedor";
        $stmt = self::$db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}
