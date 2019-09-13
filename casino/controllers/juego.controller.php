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
        if(isset($_GET) && isset($_GET['name']) && isset($_GET['players']) && isset($_GET['cards'])) {
            $juego = array($_GET['name'], $_GET['players'], $_GET['cards']);
            $this->model->addJuego($juego);
            header("Location: " . BASE);
        }
    }
}

