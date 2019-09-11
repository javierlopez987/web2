<?php
    if(isset($_GET['capital'])) {
        define("TASA", 0.55);
        define("PLAZO", 12);
        $capital = intval($_GET['capital']);
        
        $html = 
        '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Banco</title>
        </head>
        <body>
            <table>
            <thead>
                <tr>
                    <th>Mes</th>
                    <th>Capital</th>
                    <th>Interes</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>';
                for ($i = 0; $i < PLAZO; $i++) {
                    $html .= '<tr><td>' . ($i + 1) . '</td><td>' . $capital . '</td><td>' . $capital*TASA/PLAZO . '</td><td>' . $capital*(1+(TASA/PLAZO)) . '</td> </tr>';
                };
        $html .= '</tbody> </table> </body> </html>';
         echo $html;
    }
?>