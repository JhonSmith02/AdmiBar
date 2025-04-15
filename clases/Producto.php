<?php

namespace App;

class Producto{
    //Base de datos

    protected static $db;

    public $id_producto;
    public $nombre;
    public $marca;
    public $precio;
    public $iva;
    public $descripcion;
    public $categoria_id_categoria;
    public $proveedor_id_proveedor;

    public function __construct($args = [])
    {
        $this->id_producto = $args['id_producto'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->iva = $args['iva'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->categoria_id_categoria = $args['categoria_id_categoria'] ?? '';
        $this->proveedor_id_proveedor = $args['proveedor_id_proveedor'] ?? '';
    }

    public function save(){
        $query = "INSERT INTO producto (nombre, marca, precio, iva, descripcion, categoria_id_categoria, proveedor_id_proveedor)
            VALUES ('$this->nombre', '$this->marca', '$this->precio', '$this->iva', '$this->descripcion', '$this->categoria_id_categoria', '$this->proveedor_id_proveedor')";

        // debuguear($query);
        $result = self::$db->query($query);

        debuguear($result);
    }

    //Conexion a la base de datos
    public static function setDB($database){
        self::$db = $database; 
        //El self es como si estuvieramos usando $this-> pero como es statico se usa self
    }
}