<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;


class ItemView{


	function affichageItem($item){
      $app = \Slim\Slim::getInstance();

      $max = count($item);
	for ($i = 0; $i < $max; $i++) {
            echo("<img src=\"https://searchengineland.com/images/authors/BradGeddes-lg.jpg\">");
		echo('<b>Nom :</b> '.$item[$i]->nom."</br>");
		echo('<b>Description</b> : '.$item[$i]->descr."</br>");
            echo('<b>Tarif :</b> '.$item[$i]->tarif."€ </br>");
            echo("</br>");
            echo("<input type='submit' value='Reserver'>");
            echo("<input type='submit' value='Supprimer'></br>");
		}
	}
}
