<?php
    if (   isset($_GET['peso']) && isset($_GET['altura'])    )   {
        $peso = $_GET['peso'];
        $altura = $_GET['altura'];
        $IMC = $peso / $altura;
        echo $IMC;
        if ($IMC < 18.5) {
            echo "<p> Bajo peso </p>";
        } else if (($IMC >= 18.5) && ($IMC < 25) ) {
            echo "<p> Normal </p>";
        } else if (($IMC >= 25) && ($IMC < 30) ) {
            echo "<p> Sobrepeso </p>";
        } else if ($IMC >= 30) {
            echo "<p> Obesidad </p>";
        }
    }
?> 