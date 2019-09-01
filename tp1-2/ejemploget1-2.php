<?php
    if (isset($_GET['nro1'])) {
        $n1 = $_GET['nro1'];
        $n2 = $_GET['nro2'];
        $n3 = $_GET['nro3'];
        echo $n1 * $n2 - $n3; 
    }
?> 