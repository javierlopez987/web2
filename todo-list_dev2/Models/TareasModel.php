<?php

class TareasModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tareas;charset=utf8', 'root', '');
    }

	public function GetTareas(){
        $sentencia = $this->db->prepare( "select * from tarea");
        $sentencia->execute();
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $tareas;
    }	

    public function InsertarTarea($titulo,$descripcion,$prioridad,$finalziada ){

        $sentencia = $this->db->prepare("INSERT INTO tarea(titulo, descripcion,prioridad,finalizada) VALUES(?,?,?,?)");
        $sentencia->execute(array($titulo,$descripcion,$prioridad,$finalziada));
    }

    public function FinalizarTarea($id){
        $sentencia =  $this->db->prepare("UPDATE tarea SET finalizada=1 WHERE id=?");
        $sentencia->execute(array($id));
    }

    public function BorrarTarea($id){
        $sentencia = $this->db->prepare("DELETE FROM tarea WHERE id=?");
        $sentencia->execute(array($id));
    }
}

?>