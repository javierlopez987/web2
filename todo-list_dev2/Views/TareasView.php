<?php

class TareasView {

    function __construct(){

    }

    public function DisplayTareas($tareas){
        $html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <base href='.BASE_URL.' >

                <title>Tareas</title>
            </head>
            <body>';


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

        echo $html;
    }
}

?>