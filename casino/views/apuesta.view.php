<?php

class ApuestaView {
    private $view;

    function __construct() {

    }
    
    private function displayPaginaWeb($contenido) {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <title>Juegos</title>
            </head>
            <body>';
        $html .= $contenido;
        $html .='
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body>
        </html>';

        echo $html;
    }
    
    public function displayApuestas($apuestas) {
        $contenido = "<table class='table table-hover table-sm''> <thead class='thead-dark'> <tr>
            <th scope='col'> Fecha </th>
            <th scope='col'> Monto </th>
        </tr> </thead> <tbody>";
        foreach ($apuestas as $objApuesta) {
            $contenido .= "<tr>
            <td> {$objApuesta->fecha} </td> 
            <td> {$objApuesta->monto} </td>
            </tr>";
        }
        $contenido .= "</tbody> </table>";
        $contenido .= 
        "<form action='../addApuesta' method='get'>
            <input type='hidden' name='id_juego' value='{$apuestas[0]->id_juego}'>
            <input type='datetime-local' name='fecha'>
            <input type='number' name='monto' placeholder='Monto apuesta'>
            <button type='submit' class='btn btn-outline-primary'>Agregar</button>
        </form>
        <form action='../' method='post'>
            <button type='submit' class='btn btn-outline-primary'>Volver</button>
        </form>";
        $this->displayPaginaWeb($contenido);
    }

    public function displayNewApuestas($idJuego) {
        $contenido = 
        "<form action='../addApuesta' method='get'>
            <input type='hidden' name='id_juego' value='{$idJuego}'>
            <input type='datetime-local' name='fecha'>
            <input type='number' name='monto' placeholder='Monto apuesta'>
            <button type='submit' class='btn btn-outline-primary'>Agregar</button>
        </form>
        <form action='../' method='post'>
            <button type='submit' class='btn btn-outline-primary'>Volver</button>
        </form>";
        $this->displayPaginaWeb($contenido);
    }
}