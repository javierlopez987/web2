<?php



if (isset($_GET['a'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    sumar($a, $b);
}

function sumar($a, $b) {
    //echo header('Content-Type: application/text');
    echo $a + $b;
    //return $a + $b;
}

?> 