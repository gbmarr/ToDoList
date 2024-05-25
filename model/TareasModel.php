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

    function GetTareaById($id){
        try {
            $query = "SELECT `Id`, `Title`, `Description`, `Priority`, `Completed` FROM `tareas` WHERE `Id`=?";
            $params = [$id];
            $sentencia = $this->DB->executeQuery($query, $params[0]);
            $Tarea = $sentencia->fetch(PDO::FETCH_ASSOC);

                $seleccionada = new Tarea();
                $seleccionada->Id = $Tarea['Id'];
                $seleccionada->Titulo = $Tarea['Title'];
                $seleccionada->Descripcion = $Tarea['Description'];
                $seleccionada->Prioridad = $Tarea['Priority'];
                $seleccionada->Completa = $Tarea['Completed'];

            return $seleccionada;

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

    function updateTarea($Tarea){
        try {
            if(isset($Tarea)){
                $query = "UPDATE `tareas` SET `Title`=?,`Description`=?,`Priority`=? WHERE `Id`=?";
                $params = [$Tarea->Titulo, $Tarea->Descripcion, $Tarea->Prioridad, $Tarea->Id];
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

    function completeTarea($id){
        try {
            if(isset($id)){
                $query = "UPDATE `tareas` SET `Completed`=1 WHERE `Id`=?";
                $params = [$id];
                $this->DB->executeQuery($query, $params[0]);
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    function deleteTarea($id){
        try {
            if(isset($id)){
                $query = "DELETE FROM `tareas` WHERE `Id`=?";
                $params = [$id];
                $this->DB->executeQuery($query, $params[0]);
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}