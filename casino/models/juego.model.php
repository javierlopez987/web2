<?php

class JuegoModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_casino;charset=utf8', 'root', '');
    }

    public function getJuegos() {
        $query = $this->db->prepare('SELECT * FROM juego'); //preparo consulta SQL
        $ok = $query->execute(); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }

    public function addJuego($datosJuego) {
        $query = $this->db->prepare('INSERT INTO juego(nombre, cantidad_jugadores, juego_de_cartas) VALUES(?,?,?)');
        $ok = $query->execute($datosJuego); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
    }
}