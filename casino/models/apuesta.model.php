<?php

class ApuestaModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_casino;charset=utf8', 'root', '');
    }

    public function getApuestas($idJuego) {
        $query = $this->db->prepare('SELECT * FROM apuesta WHERE id_juego = ?'); //preparo consulta SQL
        $ok = $query->execute(array($idJuego)); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
        $obj = $query->fetchAll(PDO::FETCH_OBJ); //obtengo objeto
        return $obj;
    }

    public function addApuesta($datosApuesta) {
        $query = $this->db->prepare('INSERT INTO apuesta(id_juego, fecha, monto) VALUES(?,?,?)');
        $ok = $query->execute($datosApuesta); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
    }
   
    public function deleteApuesta($id) {
        $query = $this->db->prepare('DELETE FROM apuesta WHERE id_apuesta = ?');
        $ok = $query->execute(array($id)); //ejecuto consulta SQL
        if (!$ok) {var_dump($query->errorinfo()); die;} //si falla SQL muestra error
    }
}