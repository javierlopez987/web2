<?php
require_once "./models/episodio.model.php";
require_once "./views/episodio.view.php";

class EpisodioController {
    private $model;
    private $view;

    public function __construct() {
        
    }

    function getEpisodios() {
        $episodios = $this->model->getEpisodios();
        $this->view->displayEpisodios($episodios);
    }

    function addEpisodio() {
        if(isset($_GET['titulo']) && isset($_GET['descripcion']) && isset($_GET['calificacion'])) {
            if ($_GET['visto'] == 'on') {
                $visto = 1;
            } else {
                $visto = 0;
            }
            $this->model->addEpisodio($_GET['titulo'], $_GET['descripcion'], $_GET['calificacion'], $_GET['visto']);
        }
    }

}