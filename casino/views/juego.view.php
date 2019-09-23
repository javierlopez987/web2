<?php

class JuegoView {
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
    
    public function displayJuegos($juegos) {
        $contenido = "<table class='table table-hover table-sm''> <thead class='thead-dark'> <tr>
            <th scope='col'> Nombre del juego </th> 
            <th scope='col'> Máx. Jugadores </th>
            <th scope='col'> Cartas </th>
            <th scope='col'> </th>
        </tr> </thead> <tbody>";
        foreach ($juegos as $objJuego) {
            if($objJuego->juego_de_cartas != 0) {
                $asis = "checked";
            } else {
                $asis = "";
            }
            $contenido .= "<tr>
            <td> <a href='apuestas/{$objJuego->id_juego}'>{$objJuego->nombre}</a> </td> 
            <td> {$objJuego->cantidad_jugadores} </td>
            <td> <input type='checkbox' {$asis} disabled> </td>
            <td> <a href='deleteJuego/{$objJuego->id_juego}'>Borrar</a>
                <a href='updateJuego/{$objJuego->id_juego}/{$objJuego->nombre}/{$objJuego->cantidad_jugadores}/{$asis}'>Modificar</a> </td>
            </tr>";
        }
        $contenido .= "</tbody> </table>";
        $contenido .= 
        '<form action="addJuego" method="get">
            <input type="text" name="name" placeholder="Nombre">
            <input type="number" name="players" placeholder="Máx. jugadores">
            <input type="checkbox" name="cards">
            <button type="submit" class="btn btn-outline-primary">Agregar</button>
        </form>';
        $this->displayPaginaWeb($contenido);
    }

    public function displayUpdateJuego($juego) {
        $contenido = 
        "<form action='updateJuego' method='get'>
            <input type='hidden' name='id' value='{$juego[0]}'>
            <input type='text' name='name' value='{$juego[1]}'>
            <input type='number' name='players' value='{$juego[2]}'>
            <input type='checkbox' name='cards' value='{$juego[3]}'>
            <button type='submit' class='btn btn-outline-primary'>Aceptar modificación</button>
        </form>";
        $this->displayPaginaWeb($contenido);
    }
}