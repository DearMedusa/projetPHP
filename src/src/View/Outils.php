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
    <link rel=\"stylesheet\" href=\"css\style.css\">
</head>

<body>
    <header>
        <h1>Wishlist</h1>
    </header>

    <div class='content'>

");
    }


    public static function footerHTML()
    {
        echo(
        "</div>
        <footer> de Bigault de Granrut - Martin <br> IUT Nancy-Charlemagne</footer></body>
</html>");
    }
}

?>
