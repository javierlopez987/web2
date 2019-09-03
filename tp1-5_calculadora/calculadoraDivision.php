<?php
    if (isset($_GET['a']) && isset($_GET['b'])) {
        $num1 = $_GET['a'];
        $num2 = $_GET['b'];
        echo $num1 / $num2;
    }
?> 