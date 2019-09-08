<?php

function getIndex() {
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Calculadora</title>
    </head>
    <body>
        <h1>Calculadora</h1>
        <h2>Números para calcular</h2>
        <form action="sumar" method="get">
            <input type="number" name="a" id="">
            <input type="number" name="b" id="">
            <button type="submit">Sumar</button>
        </form>
        <h2>Número PI</h2>
        <form action="pi" method="get">
            <button type="submit">Obtener PI</button>
        </form>
        <h2>Acerca de</h2>
        <form action="about" method="get">
            <input type="text" name="person" id="">
            <button type="submit">Buscar</button>
        </form>
        
    </body>
    </html>';

    return $html;
}

?>