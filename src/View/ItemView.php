<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;


class ItemView{


	function affichageItems($item){
      $app = \Slim\Slim::getInstance();

      $max = count($item);
	for ($i = 0; $i < $max; $i++) {
            //echo("<img src='$item[$i]->img'>\n");
            echo("<img src='img/download.jpg'>\n");
            echo("</br>");
		echo('<b>Nom :</b> '.$item[$i]->nom."</br>");
		echo('<b>Description</b> : '.$item[$i]->descr."</br>");
            echo('<b>Tarif :</b> '.$item[$i]->tarif."€ </br>");
            echo("<b>Reservé :</b> ");
            echo("</br>");

            $boutonAfficher = "<input type='submit' value='Afficher'>";
            $add = $app->urlFor('affItem');
            //$boutonAfficher.= $add;

            echo($boutonAfficher);
            echo("<input type='submit' value='Reserver'>");
            echo("<input type='submit' value='Supprimer'></br>");
		}
      }
      
      function affichageItem($item){
            echo("<h1>test un deu un deu test</h1>");
      }

}
