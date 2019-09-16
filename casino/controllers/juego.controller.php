<?php
require_once '.\models\juego.model.php';
require_once '.\views\juego.view.php';

class JuegoController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new JuegoModel();
        $this->view = new JuegoView();
    }

    public function getJuegos() {
        $juegos = $this->model->getJuegos();
        $this->view->displayJuegos($juegos);
    }

    public function addJuego() {
        if(isset($_GET) && isset($_GET['name']) && isset($_GET['players'])) {
            if(isset($_GET['cards']) == "on") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $juego = array($_GET['name'], $_GET['players'], $cartas);
            $this->model->addJuego($juego);
            header("Location: " . BASE);
        }
    }

    public function deleteJuego($id) {
        $this->model->deleteJuego($id);
        header("Location: " . BASE);
    }

    public function updateJuego($id, $nombre, $jugadores, $cartas) {
        if(isset($_GET) && isset($_GET['id']) && isset($_GET['name']) && isset($_GET['players'])) {
            if(isset($_GET['cards']) == "on") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $this->model->updateJuego($_GET['id'], $_GET['name'], $_GET['players'], $cartas);
            header("Location: " . BASE);
        } else {
            if($cartas == "checked") {
                $cartas = 1;
            } else {
                $cartas = 0;
            }
            $juego = array($id, $nombre, $jugadores, $cartas);
            $this->view->displayUpdateJuego($juego);
        }
    }
}