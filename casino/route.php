<?php
require_once 'controllers\casino.controller.php';
require_once 'controllers\juego.controller.php';
require_once 'controllers\apuesta.controller.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$casino = new CasinoController();
$juegoController = new JuegoController();
$apuestaController = new ApuestaController();

if($action == ''){
    $casino->getTablero();
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
        } elseif($partesURL[0] == "apuestas"){
            $apuestaController->getApuestas($partesURL[1]);
        } elseif($partesURL[0] == "addApuesta"){
            $apuestaController->addApuesta();
        } elseif($partesURL[0] == "deleteApuesta"){
            $apuestaController->deleteApuesta($partesURL[1]);
        }
    }
}