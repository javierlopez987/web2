<?php

require_once "tareas.php";

$action = $_GET["action"];

if($action == ''){
    echo GetTareas();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "tareas"){
            echo  GetTareas();
        }elseif($partesURL[0] == "insertar") {
            InsertarTarea();
        }elseif($partesURL[0] == "finalizar") {
            FinalizarTarea($partesURL[1]);
        }elseif($partesURL[0] == "borrar") {
            BorrarTarea($partesURL[1]);
        }
    }
}

?>