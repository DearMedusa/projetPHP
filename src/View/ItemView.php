<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;


class ItemView{


	function affichageItem($item){
      $app = \Slim\Slim::getInstance();

      $max = count($item);
	for ($i = 0; $i < $max; $i++) {
            echo("<img src=".$item[$i]->img."></br>");
		echo('Nom : '.$item[$i]->nom."</br>");
		echo('Description : '.$item[$i]->descr."</br>");
            echo('Tarif : '.$item[$i]->tarif."€ </br>");
            echo("</br>");
            echo("<input type='submit' value='Supprimer'>");
            echo("<input type='submit' value='Reserver'></br>");
		}

	}

}
