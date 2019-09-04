<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="estilo.css">
        <title>tabla config por usuario</title>
    </head>
    <body>

        <?php
            echo "<h1>tabla creada por usuario filas x columnas</h1>";
            if(isset($_GET['filas'])  && $_GET['filas'] !== "" ){ 
                $filas = $_GET['filas'];

                if(isset($_GET['columnas'])  && $_GET['columnas'] !== "" ){ 
                    $columnas = $_GET['columnas'];
                }
               
            }
            echo '<table>';
            for($i=1;$i<=$filas;$i++)
            {
               echo '<tr>';
               for($j=1;$j<=$columnas;$j++)
                   
               {
                   $multiplica=($i*$j);
                   echo "<td>$multiplica</td>";
               }
               echo '</tr>';
            }
            echo '</table>';
        ?>
            
    </body>
</html>