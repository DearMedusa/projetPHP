<?php

namespace PHPProject\View;

class Outils
{
    public static function headerHTML(String $titre)
    {
        echo(
        "<!DOCTYPE html>
        <html lang='fr'>
            <head>
                <meta charset='UTF-8'>
                <title>$titre</title>
                <link rel=\"stylesheet\" href=\"style.css\">
            </head>

            <body>
                <header>
                    <h1>Wishlist</h1>
                </header>

    <div class='content'>");
    }


    public static function footerHTML()
    {
        echo(
        "</div>
        <footer> de Granrut - Martin <br> IUT Nancy-Charlemagne <br> Année 2019-2020 </footer></body>
        </html>");
    }
}

?>
