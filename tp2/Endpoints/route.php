<?php
    require_once "endpoint.php";

    $action = $_GET["action"];

    if($action == ''){
        showPaginaWeb( menuWeb() );
    }else{
        if (isset($action)){
            $partesURL = explode("/", $action);

            if($partesURL[0] == "presentismo"){
                showPaginaWeb( showPresentismo() );
            }elseif($partesURL[0] == "materias"){
                showPaginaWeb( showMaterias() );
            }elseif($partesURL[0] == "alumnos") {
                showPaginaWeb( showAlumnos() );
            }elseif($partesURL[0] == "addMateria"){
                addMateria();
            }elseif($partesURL[0] == "addAlumno") {
                addAlumno();
            }
        }
    }
?>