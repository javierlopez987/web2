<?php
    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        $edad = $_GET['edad'];
        echo "Nombre: " . $nombre . "</br>";
        echo "Edad: " . $edad; 
    }
?>