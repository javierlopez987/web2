<?php
require_once "./Models/TareasModel.php";
require_once "./Views/TareasView.php";

class TareasController {

    private $model;
    private $view;

	function __construct(){
        $this->model = new TareasModel();
        $this->view = new TareasView();
    }
    
    public function GetTareas(){
        $tareas = $this->model->GetTareas();
        $this->view->DisplayTareas($tareas);
    }

    public function InsertarTarea(){
        $finalziada = 0;
        if($_POST['finalizada'] == 'on'){
            $finalziada = 1;
        }
        $this->model->InsertarTarea($_POST['titulo'],$_POST['descripcion'],$_POST['prioridad'],$finalziada );
        header("Location: " . BASE_URL);
    }

    public function FinalizarTarea($id){
        $this->model->FinalizarTarea($id);
        header("Location: " . BASE_URL);
    }

    public function BorrarTarea($id){
        $this->model->BorrarTarea($id);
        header("Location: " . BASE_URL);
    }
}


?>