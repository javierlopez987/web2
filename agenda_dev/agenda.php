<?php
    function connect() {
        $db = new PDO('mysql:host=localhost;dbname=db_agenda_dev;charset=utf8', 'root', '');
        return $db;
    }
    
    function getMaterias() {
        //conecto
        $db_connection = connect();
        //preparo
        $query = $db_connection->prepare('SELECT * FROM materia');
        //ejecuto
        $ok = $query->execute();
        //si falla SQL muestra error
        if (!$ok) {
            var_dump($query->errorinfo());
            die();
        }
        //obtengo la respuesta
        $materias = $query->fetchAll(PDO::FETCH_OBJ);
        var_dump($materias);die;
        return $materias;
    }

    function showMaterias() {
        $objMaterias = getMaterias();
        
        $div = "<div>";
        foreach ($objMaterias as $materia) {
            $div .= "<div> {$materia->denominacion} </div>";
            $div .= "<div>{$materia->descripcion} </div>";
        }
        $div .= "</div>";
        //var_dump($div);die;
        return $div;
    }

    function showPaginaWeb () {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Presentismo</title>
        </head>
        <body>';

        $html .= showMaterias();
        $html .= '
        </body>
        </html>';

        echo $html;
    }
?>