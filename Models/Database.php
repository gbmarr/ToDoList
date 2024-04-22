<?php

// Crear funcionalidades de:
// Funcion que establezca conexion a DB
// Verificar si es correcto crear funciones para cada consulta (SELECT, INSERT, UPDATE, DELETE)
// Funcion de cierre de la conexion a DB

class Database {
    public $host = 'localhost';
    public $dbName = 'todolist_webii;charset=utf8';
    public $user = 'root';
    public $pass = '';
    public $conn;

    public function __construct() {
        try {
            $conection = "mysql:host={$this->host};dbname={$this->dbName}";
            $this->conn = new PDO($conection, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión realizada de manera existosa";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }

    public function executeQuery($query, $params = []) {
        try {
            $consulta = $this->conn->prepare($query);
            $consulta->execute($params);
            return $consulta;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}