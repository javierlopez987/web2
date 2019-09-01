<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello PHP</title>
</head>
<body>
    <?php
        $titulo = "Autos";
        echo "<h1>" . $titulo . "<h1>";

        $cars = array(
            "VW" => "Gol", 
            "Ford" => "Ka", 
            "Toyota" => "Ethios",
            "Renault" => "Clio"
        );
        
        foreach ($cars as $car => $modelo) {
            echo "<li>" . $modelo . "</li>"; 
        }

        include 'localidades.php';
        echo "Origen $ciudad $prov";

        include 'edad.php';
        foreach ($edades as $usuario => $edad) {
            echo "<li>" . $usuario . ": " . $edad . "</li>";
        }
    ?>  
</body>
</html>