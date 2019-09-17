<?php

class CasinoModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_casino;charset=utf8', 'root', '');
    }

    public function getTablero() {
        $query = $this->db->prepare('SELECT * FROM apuesta T1 INNER JOIN juego T2 ON T1.id_juego = T2.id_juego'); //preparo consulta SQL
        $ok = $query->execute(); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }
}