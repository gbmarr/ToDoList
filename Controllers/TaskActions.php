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

function listTasks(){
    $taskList = getTasks();
    $echo = "";
    if (!empty($taskList)) {
        foreach ($taskList as $task) {
            $echo .= "<div class='task__card'>
                    <h3 class='task__card__title'>{$task->Title}</h3>
                    <article class='task__card__desc'>{$task->Description}</article>
                    <p class='task__card__priority'>{$task->Priority}</p>
                <div>
                    <button>Completar</button>
                    <button>Editar</button>
                    <button>Eliminar</button>
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
