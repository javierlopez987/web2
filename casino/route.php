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
        } elseif($partesURL[0] == "addJuego"){
            $juegoController->addJuego();
        } elseif($partesURL[0] == "deleteJuego"){
            $juegoController->deleteJuego($partesURL[1]);
        } elseif($partesURL[0] == "updateJuego"){
            $juegoController->updateJuego($partesURL[1], $partesURL[2], $partesURL[3], $partesURL[4]);
        }
    }
}