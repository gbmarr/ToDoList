<?php
require_once './view/TareasView.php';
require_once './model/TareasModel.php';
require_once './model/Tarea.php';
require_once './BASE_URL.php';

class TareasController{

    private $view;
    private $model;

    function __construct()
    {
        $this->model = new TareasModel();
        $this->view = new TareasView();
    }

    function ListarTareas(){
        // llamado al modelo para listar y al view
        $Tareas = $this->model->GetTareas();
        $this->view->Mostrar($Tareas);
    }

    function InsertarTarea(){
        $Tarea = new Tarea();
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)){
            $Tarea->Titulo = $_POST['titulo'];
            $Tarea->Descripcion = $_POST['desc'];
            $Tarea->Prioridad = $_POST['prioridad'];
            $agregada = $this->model->insertTarea($Tarea);
            if($agregada){
                header("Location:". BASE_URL);
            }
        }else{
            header("Location:". BASE_URL ."/Error");
        }
    }

    function ActualizarTarea($id){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id)){
            $Tarea = $this->model->GetTareaById($id);
            // si se actualizo enviar nuevamente al home
            if(isset($Tarea)){
                $this->view->Formulario($Tarea);
            }else{
                header("Location:". BASE_URL ."/Error");
            }
        }
    }

    function ActualizarDatos(){
        $Tarea = new Tarea();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) && isset($_GET['id'])){
            $Tarea->Id = $_GET['Id'];
            $Tarea->Titulo = $_POST['titulo'];
            $Tarea->Descripcion = $_POST['desc'];
            $Tarea->Prioridad = $_POST['prioridad'];
            $modificada = $this->model->updateTarea($Tarea);
            if($modificada){
                header("Location:". BASE_URL);
            }
        }else{
            header("Location:". BASE_URL ."/Error");
    }
}

    function CompletarTarea($id){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id)){
            $completada = $this->model->completeTarea($id);
            if($completada){
                header("Location:". BASE_URL);
            }else{
                header("Location:". BASE_URL ."/Error");
            }
        }else{
            header("Location:". BASE_URL ."/Error");
        }
    }

    function VerDetalle($id) {
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id)){
            $Tarea = $this->model->GetTareaById($id);
            if(isset($Tarea)){
                $this->view->Detalle($Tarea);
            }else{
                header("Location:". BASE_URL ."/Error");
            }
        }
    }

    function BorrarTarea($id){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id)){
            $eliminada = $this->model->deleteTarea($id);
            if($eliminada){
                header("Location:". BASE_URL);
            }else{
                header("Location:". BASE_URL ."/Error");
            }
        }else{
            header("Location:". BASE_URL ."/Error");
        }
    }

}