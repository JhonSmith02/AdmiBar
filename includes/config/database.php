<?php 

//Conexion
class database{
    private $host = 'localhost';
    private $dbname = 'admibar';
    private $user = 'root';
    private $pass = 'root';

    public $connection;


    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host; dbname=$this->dbname", $this->user, $this->pass);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getConnection(){
        return $this->connection;
    }

}