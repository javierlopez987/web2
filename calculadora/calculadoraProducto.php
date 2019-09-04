<?php
    if (isset($_GET['a']) && isset($_GET['b'])) {
        $num1 = $_GET['a'];
        $num2 = $_GET['b'];
        multiplicar($num1, $num2);
    }

    function multiplicar($a, $b) {
        echo $a * $b;
    }
?> 