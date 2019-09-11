<?php
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    function connect() {
        $db = new PDO('mysql:host=192.168.0.5;dbname=centro_de_cobro;charset=utf8', 'root', '');
        return $db;
    }
    
    function getQuery($querySQL) {
        $db_connection = connect(); //conecto a la BD
        $query = $db_connection->prepare($querySQL); //preparo consulta SQL
        $ok = $query->execute(); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }
    
    function getMaterias() {
        $queryMaterias = 'SELECT * FROM datos_deuda';
        $objMaterias = getQuery($queryMaterias);
        return $objMaterias;
    }

 /*    function getAlumnos() {
        $queryAlumnos = 'SELECT * FROM datos_usuario';
        $objAlumnos = getQuery($queryAlumnos);
        return $objAlumnos;
    } */

   /*  function getPresentismo() {
        $queryPresentismo = 'SELECT T1.*, T2.*, T3.*
        FROM materia_alumno AS T1
        INNER JOIN alumno AS T2
           ON T1.id_alumno = T2.id_alumno
        LEFT JOIN materia AS T3
           ON T1.id_materia = T3.id_materia
        WHERE T3.id_materia = 2';
        $objPresentismo = getQuery($queryPresentismo);
        return $objPresentismo;
    } */

/*     function showPresentismo() {
        $objPresentismo = getPresentismo();
        $div = "<table> <tr>
            <th> Fecha </th> 
            <th> Materia </th>
            <th> Alumno </th> 
            <th> Asistencia </th>
        </tr>";
        foreach ($objPresentismo as $asistencia) {
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
    } */

    function showMaterias() {
        $objMaterias = getMaterias();
        $div = "<ul>";
        foreach ($objMaterias as $materia) {
            $div .= "<li> {$materia->fecha}: {$materia->monto}. {$materia->pago}</li>";
        }
        $div .= "</ul>";
        $div .= 
            '<form action="addMateria" method="post">
                <input type="date" name="fecha">
                <input type="number" name="monto" placeholder="Monto">
                <input type="checkbox" name="pago">
                <button type="submit" class="btn btn-outline-primary">Insertar</button>
            </form>';
        return $div;
    }

 /*    function showAlumnos() {
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
                <button type="submit" class="btn btn-outline-primary">Insertar</button>
            </form>';
        return $div;
    } */

    function menuWeb() {
        $menu = 
        
/*         <form action="presentismo" method="post">
            <button type="submit">Presentismo</button>
        </form> */
        '<form action="materias" method="post">
            <button type="submit">Materias</button>
        </form>'
/*         <form action="alumnos" method="post">
            <button type="submit">Alumnos</button>
        </form> */
        ;
        return $menu;
    }

    function showPaginaWeb ($contenido) {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Presentismo</title>
        </head>
        <body>';
        $html .= $contenido;
        $html .='
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
        </html>';

        echo $html;
    }

    function addMateria(){
        $pagado = 0;
        if($_POST['pago'] == 'on'){
             $pagado = 1;
        }
        $db_connection = connect(); //conecto
        $query = $db_connection->prepare(
            "INSERT INTO datos_deuda (fecha, monto, pago) 
            VALUES(?,?,?)"); //preparo
        $ok = $query->execute(array($_POST['fecha'],$_POST['monto'],$pagado)); //ejecuto
        if (!$ok) {
            var_dump($query->errorinfo());
            die();
        } //si falla SQL muestra error
        header("Location: " . BASE); //vuelve a url
    }

 /*    function addAlumno(){
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
        header("Location: " . BASE); //vuelve a url
    } */
?>