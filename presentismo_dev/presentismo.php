<?php
    function connect() {
        $db = new PDO('mysql:host=localhost;dbname=db_presentismo;charset=utf8', 'root', '');
        return $db;
    }
    
    function getMaterias() {
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare('SELECT * FROM materia'); //preparo
        $ok = $query->execute(); //ejecuto
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $materias = $query->fetchAll(PDO::FETCH_OBJ); //obtengo la respuesta
        return $materias;
    }

    function getAlumnos() {
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare('SELECT * FROM alumno'); //preparo
        $ok = $query->execute(); //ejecuto
        if (!$ok) { var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $alumnos = $query->fetchAll(PDO::FETCH_OBJ); //obtengo la respuesta
        return $alumnos;
    }

    function getPresentismo() {
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare( 
            'SELECT T1.*, T2.*, T3.*
            FROM materia_alumno AS T1
            INNER JOIN alumno AS T2
               ON T1.id_alumno = T2.id_alumno
            LEFT JOIN materia AS T3
               ON T1.id_materia = T3.id_materia
            WHERE T3.id_materia = 2'
            ); //preparo
        $ok = $query->execute(); //ejecuto
        if (!$ok) {
            var_dump($query->errorinfo());
            die();
        } //si falla SQL muestra error
        $presentismo = $query->fetchAll(PDO::FETCH_OBJ); //obtengo la respuesta
        return $presentismo;
    }

    function showPresentismo() {
        $objAsistencia = getPresentismo();
        //var_dump($objAsistencia);die;
        $div = "<table>";
        foreach ($objAsistencia as $asistencia) {
                if($asistencia->asistencia != 0) {
                    $asis = "checked";
                }
            $div .= "<tr>
            <td> {$asistencia->fecha} </td> 
            <td> {$asistencia->denominacion} </td>
            <td> {$asistencia->apellido}, {$asistencia->nombre} </td> 
            <td> <input type='checkbox' {$asis} disabled> </td>
            </tr>";
            $asis = "";
        }
        $div .= "</table>";
        return $div;
    }

    function showMaterias() {
        $objMaterias = getMaterias();
        $div = "<ul>";
        foreach ($objMaterias as $materia) {
            $div .= "<li> {$materia->denominacion}: {$materia->docente}. {$materia->descripcion}</li>";
        }
        $div .= "</ul>";
        $div .= 
            '<form action="addMateria" method="post">
                <input type="text" name="denominacion" placeholder="Título">
                <input type="text" name="docente" placeholder="Docente">
                <input type="text" name="descripcion"  placeholder="Descripción">
                <button type="submit">Insertar</button>
            </form>';
        return $div;
    }

    function showAlumnos() {
        $objAlumnos = getAlumnos();
        $div = "<ul>";
        foreach ($objAlumnos as $alumno) {
            $div .= "<li> {$alumno->apellido}, {$alumno->nombre} </li>";
        }
        $div .= "</ul>";
        $div .= 
            '<form action="addAlumno" method="post">
                <input type="text" name="apellido" placeholder="Apellido">
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="date" name="f_nac">
                <input type="email" name="email"  placeholder="ejemplo@gmail.com">
                <input type="text" name="celular"  placeholder="+549 249 4490755">
                <button type="submit">Insertar</button>
            </form>';
        return $div;
    }

    function menuWeb() {
        $menu = 
        '<form action="presentismo" method="post">
            <button type="submit">Presentismo</button>
        </form>
        <form action="materias" method="post">
            <button type="submit">Materias</button>
        </form>
        <form action="alumnos" method="post">
            <button type="submit">Alumnos</button>
        </form>';
        return $menu;
    }

    function showPaginaWeb ($contenido) {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Presentismo</title>
        </head>
        <body>';
        $html .= $contenido;
        $html .='</body>
        </html>';

        echo $html;
    }

    function addMateria(){
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare(
            "INSERT INTO materia (denominacion, docente, descripcion) 
            VALUES(?,?,?)"); //preparo
        $ok = $query->execute(array($_POST['denominacion'],$_POST['docente'],$_POST['descripcion'])); //ejecuto
        if (!$ok) {
            var_dump($query->errorinfo());
            die();
        } //si falla SQL muestra error
        header("Location: /web2/dev/presentismo_dev/"); //vuelve a url
    }

    function addAlumno(){
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare(
            "INSERT INTO alumno (apellido, nombre, f_nac, email, celular) 
            VALUES(?,?,?,?,?)"); //preparo
        $ok = $query->execute(
            array($_POST['apellido'],
                $_POST['nombre'],
                $_POST['f_nac'], 
                $_POST['email'],
                $_POST['celular'])); //ejecuto
        if (!$ok) {
            var_dump($query->errorinfo());
            die();
        } //si falla SQL muestra error
        header("Location: /web2/dev/presentismo_dev/"); //vuelve a url
    }
?>