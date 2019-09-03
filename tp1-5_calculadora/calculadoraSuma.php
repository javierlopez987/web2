<?php
    if (isset($_GET['a']) && isset($_GET['b'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        sumar($a, $b);
    }

    function sumar($a, $b) {
        echo $a + $b;
    }
?> 