<?php
    var_dump($_GET['inputPpal']);die;
    if(isset($_GET['inputPpal'])) {
        /*
        $suma = 0;
        for ($i=0; $i < $_GET['inputPpal']; $i++) { 
            
        }
            $suma += $input.value;
        }
        echo $suma;
        */
        echo $_GET['inputPpal'];
    } else {
        echo "No entra al isset";
    }
?> 