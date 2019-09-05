<?php 
    $path = "http://localhost/web2/dev/persistencia/datos.json"; 
    $file = fopen($path, "r"); 
    while (!feof($file)) 
        echo (fgets($file)); 
    fclose($file); 
?>
