<?php
    if (isset($_GET['num'])) {
        $num = $_GET['num'];
        for ($i = 1; $i <= $num; $i++) {
            for ($j = 1; $j <= $num; $j++) {
                echo $i * $j . "&nbsp";
            }
            echo "</br>";
        }
    }
?> 