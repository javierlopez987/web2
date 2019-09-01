<?php
    $edades = array( 
	    "Javier" => 35, 
	    "Nicolás" => 32, 
	    "Julia" => 23 
	); 

	$usuario = $_GET['usuario'];
	echo $usuario . " tiene " . $edades[$usuario] . " años";

?>