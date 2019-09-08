<?php
function Connect(){
    return new PDO('mysql:host=' . $_SERVER["SERVER_NAME"] . ';dbname=tareas;charset=utf8', 'root', '');
}

function GetTareas(){
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <base href="http://'.$_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"]).'/" >

        <title>Tareas</title>
    </head>
    <body>';

    $db = Connect();
 
    $sentencia = $db->prepare( "select * from tarea");
    $sentencia->execute();
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);

    foreach($tareas as $tarea) {
        if($tarea->finalizada == 1){
            $html.= "<strike><li>". $tarea->titulo .": ". $tarea->descripcion. "</li></strike>";
        }else{
            $html.= "<li>". $tarea->titulo .": ". $tarea->descripcion. " - <a href='finalizar/".$tarea->id."'>Finalizar</a>". " - <a href='borrar/".$tarea->id."'>Borrar</a></li>";
        }
    }

    $html.='<form action="insertar" method="post">
        <input type="text" name="titulo" placeholder="Titulo">
        <input type="text" name="descripcion" placeholder="Descripcion">
        <input type="number" name="prioridad"  max="10">
        <input type="checkbox" name="finalizada" id="finalizada">
        <input type="submit" value="Insertar">
    </form>';

    $html.='</body>
    </html>';

    return $html;
}

function InsertarTarea(){
    $db = Connect();
 
    $finalziada = 0;
    if($_POST['finalizada'] == 'on'){
        $finalziada = 1;
    }
    $sentencia = $db->prepare("INSERT INTO tarea(titulo, descripcion,prioridad,finalizada) VALUES(?,?,?,?)");
    $sentencia->execute(array($_POST['titulo'],$_POST['descripcion'],$_POST['prioridad'],$finalziada));

    header("Location: /web2/dev/todo-list_dev/");
}

function FinalizarTarea($id){
    $db = Connect();

    $sentencia = $db->prepare("UPDATE tarea SET finalizada=1 WHERE id=?");
    $sentencia->execute(array($id));

    header("Location: /web2/dev/todo-list_dev/");
}

function BorrarTarea($id){
    $db = Connect();

    $sentencia = $db->prepare("DELETE FROM tarea WHERE id=?");
    $sentencia->execute(array($id));

    header("Location: /web2/dev/todo-list_dev/");
}

?>