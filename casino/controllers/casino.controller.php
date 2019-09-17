<?php
require_once '.\models\casino.model.php';
require_once '.\views\casino.view.php';

class CasinoController {
    private $casinoModel;
    private $casinoView;

    function __construct() {
        $this->casinoModel = new CasinoModel();
        $this->casinoView = new CasinoView();
    }

    public function getTablero() {
        $tablero = $this->casinoModel->getTablero();
        $this->casinoView->displayCasino($tablero);
    }
}