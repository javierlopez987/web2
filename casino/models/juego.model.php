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

    public function deleteJuego($id) {
        $query = $this->db->prepare('DELETE FROM juego WHERE id_juego = ?');
        $ok = $query->execute(array($id)); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
    }

    public function updateJuego($id, $nombre, $jugadores, $cartas) {
        $query = $this->db->prepare('UPDATE juego SET nombre = :nombre, cantidad_jugadores = :jugadores, juego_de_cartas = :cartas WHERE id_juego = :id');
        $ok = $query->execute(array(':id' => $id, ':nombre' => $nombre, ':jugadores' => $jugadores, ':cartas' => $cartas)); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
    }
}