<?php
    if (isset($_GET['a']) && isset($_GET['b'])) {
        $num1 = $_GET['a'];
        $num2 = $_GET['b'];
        restar($num1, $num2);
    }

    function restar($a, $b) {
        echo $a - $b;
    }
?> 