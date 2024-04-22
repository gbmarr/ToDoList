<?php
// Crear funcionalidades de:
// Listar tareas, agregar tarea, marcar como finalizada y eliminar tarea

require_once '../Models/Database.php';
include_once '../Models/Task.php';


function getTasks() {
    try {
        $DB = new Database();
        $query = "SELECT `Id`, `Title`, `Description`, `Priority`, `Completed` FROM `tareas`";
        $sentencia = $DB->executeQuery($query);
        $tasks = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $listaTask = [];
    
        foreach ($tasks as $item) {
            $nuevo = new Task();
            $nuevo->Id = $item['Id'];
            $nuevo->Title = $item['Title'];
            $nuevo->Description = $item['Description'];
            $nuevo->Priority = $item['Priority'];
            $nuevo->Completed = $item['Completed'];

            // array_push($listaTask, $nuevo);
            $listaTask[] = $nuevo;
        }
    
        return $listaTask;

    }  catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}