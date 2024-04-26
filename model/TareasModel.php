<?php
require_once 'Database.php';
require_once 'Tarea.php';

class TareasModel{
    private $DB;

    function __construct(){
        $this->DB = new Database();
    }

    function GetTareas(){
        try {
            $query = "SELECT `Id`, `Title`, `Description`, `Priority`, `Completed` FROM `tareas`";
            $sentencia = $this->DB->executeQuery($query);
            $Tareas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $listaTareas = [];

            foreach($Tareas as $item){
                $nuevo = new Tarea();
                $nuevo->Id = $item['Id'];
                $nuevo->Titulo = $item['Title'];
                $nuevo->Descripcion = $item['Description'];
                $nuevo->Prioridad = $item['Priority'];
                $nuevo->Completa = $item['Completed'];

                $listaTareas[] = $nuevo;
            }

            return $listaTareas;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function insertTarea($Tarea){
        // parametros ---^
        try {
            if(isset($Tarea)){
                $query = "INSERT INTO tareas (`Title`, `Description`, `Priority`) VALUES (?, ?, ?)";
                $params = [$Tarea->Titulo, $Tarea->Descripcion, $Tarea->Prioridad];
                $this->DB->executeQuery($query, $params);
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function updateTarea($id){
    }

    function completeTarea($id){
    }

    function deleteTarea($id){
    }
}