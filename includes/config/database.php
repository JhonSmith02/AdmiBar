<?php 

//Conexion
class database{
    private $host = 'localhost';
    private $dbname = 'admibar';
    private $user = 'root';
    private $pass = 'root';

    public $conexion;


    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getConexion(){
        return $this->conexion;
    }

}