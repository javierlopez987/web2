<?php
require_once '.\models\apuesta.model.php';
require_once '.\views\apuesta.view.php';

class ApuestaController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new apuestaModel();
        $this->view = new apuestaView();
    }

    public function getApuestas($idJuego) {
        $apuestas = $this->model->getApuestas($idJuego);
        if ($apuestas != null) {
            $this->view->displayApuestas($apuestas);
        } else {
            $this->view->displayNewApuestas($idJuego);
        }
    }

    public function addApuesta() {
        if(isset($_GET) && isset($_GET['id_juego']) && isset($_GET['fecha']) && isset($_GET['monto'])) {
            $apuesta = array($_GET['id_juego'], $_GET['fecha'], $_GET['monto']);
            $this->model->addApuesta($apuesta);
            header("Location: " . BASE . "apuestas/" . $_GET['id_juego']);
        }
    }
   
    public function deleteApuesta($id) {
        $this->model->deleteApuesta($id);
        header("Location: " . BASE);
    }
}