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
    }

    function CompletarTarea($id){
        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($id)){
            $this->model->completeTarea($id);
        }
    }

    function BorrarTarea($id){
    }

}