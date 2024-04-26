<?php

class Database{
    private $Host;
    private $dbUser;
    private $dbPass;
    private $dbName;
    private $conn;
    
    function __construct(){
        $this->Host = 'localhost';
        $this->dbName = 'todolist_webii;charset=utf8';
        $this->dbUser = 'root';
        $this->dbPass = '';
        try {
            $conexion = "mysql:host={$this->Host};dbname={$this->dbName}";
            $this->conn = new PDO($conexion, $this->dbUser, $this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            echo "Conexión realizada de manera exitosa";
        } catch (Exception $e) {
            echo "Error de conexión: " .$e->getMessage();
            die();
        }
    }
    
    function executeQuery($query, $params = []){
        try {
            $consulta = $this->conn->prepare($query);
            $consulta->execute($params);
            return $consulta;
        } catch (PDOException $th) {
            echo "Error: " . $th->getMessage();
            return null;
        }
    }
}