<?php
require_once 'controllers\juego.controller.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$juegoController = new JuegoController();

if($action == ''){
    $juegoController->getJuegos();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);
        if($partesURL[0] == "juegos"){
            $juegoController->getJuegos();
        }elseif($partesURL[0] == "add"){
            $juegoController->addJuego();
        }
    }
}