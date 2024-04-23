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

            $listaTask[] = $nuevo;
        }
    
        return $listaTask;

    }  catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function listTasks(){
    $taskList = getTasks();
    $echo = "";
    if (!empty($taskList)) {
        foreach ($taskList as $task) {
            $echo .= "<div class='task__card'>
                    <h3 class='task__card__title'>{$task->Title}</h3>
                    <article class='task__card__desc'>{$task->Description}</article>
                    <p class='task__card__priority'>Prioridad: {$task->Priority}</p>
                <div class='task__card__btn__container'>
                <div>
                    <button class='btn__complete'>Completar</button>
                    <button class='btn__edit'>Editar</button>
                    <button class='btn__delete' data-id='{$task->Id}'>Eliminar</button>
                </div>
                    <button class='btn__verdetalle'>Detalle</button>
                </div>
                </div>";
        }    
    } else {
        $echo = "<div class='task__card'>
        <h3 class='task__card__title'>No existen tareas actualmente.</h3>
        </div>";
    }

    echo $echo;
}

// Revisar con el profe de prácticas el método
// Error: funciona el AJAX pero no elimina el registro de la DB
function deleteTask(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $datos = json_decode(file_get_contents('php://input'), true);

        if(isset($datos['taskId'])) {
            $taskId = $datos['taskId'];
            echo $taskId;
            $DB = new Database();
            $query = "DELETE FROM `tareas` WHERE Id = ?";
            $DB->executeQuery($query, [$taskId]);
            echo "TAREA ELIMINADA CORRECTAMENTE";
        }else{
            echo "ID DE TAREA INCORRECTO";
        }
    }
}


