<?php
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

function connect(){
    return new PDO ('mysql:host=localhost;'.'dbname=tareas;charset=utf8' ,'root', '');
}

function GetTareas(){

    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <base href='.BASE.' >
        
        <title>Tareas</title>
        </head>
    <body>';
    
    $db= connect();

    $sentencia= $db-> prepare("select * from tarea");
    $sentencia= execute();
    $tareas= $sentencia->fetchAll(PDO::FETCH_OBJ);

    foreach ($tareas as $tarea) {
         $html .= "<li>".$tarea->titulo."</li>";
    
    }



    $html .='<form action="insertar" method="post">
    <input type="text" name="titulo" placeholder="Titulo">
    <input type="submit" value="Insertar">
    </form>';

    $html.='</body>
    </html>';

    return $html;

   
    
}

function insertarTarea(){

    $db= connect();
    $sentencia= $db->prepare("INSERT INTO tarea(titulo, descripcion,prioridad,finalizada) VALUES(?,?,?,?)");
    $sentencia->execute(array($_POST['titulo'],$_POST['descripcion'],$_POST['prioridad'],$finalziada));

    //header("Location: " . BASE);
}



?>