<?php
class EpisodioModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_streaming;charset=utf8', 'root', '');
    }

    function addEpisodio($episodio) {
        
    }
}
