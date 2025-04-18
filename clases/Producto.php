<?php

namespace App;

use PDO;

class Producto
{
    //Base de datos
    protected static $db;

    //validaciones
    protected static $errors = [];

    //Atributos
    public $id_producto;
    public $nombre;
    public $marca;
    public $precio;
    public $iva;
    public $descripcion;
    public $categoria_id_categoria;
    public $proveedor_id_proveedor;

    //Conexion a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
        //El self es como si estuvieramos usando $this-> pero como es statico se usa self
    }

    public function __construct($args = [])
    {
        if (!empty($args)) {
            $this->id_producto = $args['id_producto'] ?? '';
            $this->nombre = $args['nombre'] ?? '';
            $this->marca = $args['marca'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->iva = $args['iva'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->categoria_id_categoria = $args['categoria_id_categoria'] ?? '';
            $this->proveedor_id_proveedor = $args['proveedor_id_proveedor'] ?? '';
        }
    }

    //Funcion de guardado con sentencias preparadas
    public function save()
    {

        $query = "INSERT INTO producto (nombre, marca, precio, iva, descripcion, categoria_id_categoria, proveedor_id_proveedor)
            VALUES (:nombre, :marca, :precio, :iva, :descripcion, :categoria_id_categoria, :proveedor_id_proveedor)";

        $stmt = self::$db->prepare($query);

        //Sanitizacion y asociacion de parametros
        $stmt->bindValue(':nombre', strip_tags(trim($this->nombre)), PDO::PARAM_STR);
        $stmt->bindValue(':marca', strip_tags(trim($this->marca)), PDO::PARAM_STR);
        $stmt->bindValue(':precio', floatval($this->precio), PDO::PARAM_STR);
        $stmt->bindValue(':iva', floatval($this->iva), PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', strip_tags(trim($this->descripcion)), PDO::PARAM_STR);
        $stmt->bindValue(':categoria_id_categoria', intval($this->categoria_id_categoria), PDO::PARAM_INT);
        $stmt->bindValue(':proveedor_id_proveedor', intval($this->proveedor_id_proveedor), PDO::PARAM_INT);

        $stmt->execute();
    }

    //Leer los productos

    public static function all()
    {
        $query = "SELECT * FROM producto";
        $stmt = self::$db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        // debuguear($result);
    }

    //validacion
    public static function getErrors()
    {
        return self::$errors;
    }

    public function validate()
    {
        if (!$this->nombre) {
            self::$errors[] = "Debes agrebar un nombre";
        }

        if (!$this->marca) {
            self::$errors[] = "Debes agregar una marca para el producto";
        }

        if (!$this->precio) {
            self::$errors[] = "Debes agregar el precio del producto";
        }

        if (!$this->iva) {
            self::$errors[] = "Debes agregar el Iva del producto";
        }

        if (!$this->descripcion) {
            self::$errors[] = "Debes agregar una descripcion";
        }

        if (!$this->categoria_id_categoria) {
            self::$errors[] = "Debes agregar una categoria para el producto";
        }

        if (!$this->proveedor_id_proveedor) {
            self::$errors[] = "Debes agregar un proveedor para el producto";
        }

        return self::$errors;
    }
}
