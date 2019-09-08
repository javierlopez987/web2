<?php
    require_once "presentismo.php";

    $action = $_GET["action"];

    if($action == ''){
        showPaginaWeb();
    }else{
        if (isset($action)){
            $partesURL = explode("/", $action);

            if($partesURL[0] == "tareas"){
                GetTareas();
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