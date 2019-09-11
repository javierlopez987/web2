<?php
    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        echo "Nombre: " . $nombre . "</br>";
        echo "Apellido: " . $apellido . "</br>"; 
        echo "Edad: " . $edad . "</br>"; 
    }
?>