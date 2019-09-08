<?php
    //var_dump($_GET['inputs']);die;
    if(isset($_GET['inputs'])) {
        $inputs = $_GET['inputs'];
        $suma = 0;
        foreach ($inputs as $input) {
            $suma += $input;
        }
        echo $suma;
    } else {
        echo "No entra al isset";
    }
?> 