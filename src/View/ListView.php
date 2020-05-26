<?php
namespace PHPProject\View;

use \PHPProject\Controller\UserController as UserController;
use \PHPProject\models\Liste as Liste;
use \PHPProject\Controller\ListController as ListController;


class ListView{

	public function affichageListe($user){
		$app = \Slim\Slim::getInstance();
		ListController::getListUser($user->id);//on recupere 
		$liste = Liste::select('*')->where ('user_id','=', $user->id)->get();//RETOURNE UN TABLEAU D'OBJETS
		
		$max = count($liste);
		for ($i = 0; $i < $max; $i++) {
			echo("<h1> Liste(s) de ".$user->login."</h1>");//retourne le nom de l'utilisateur de la liste
			echo('Titre : '.$liste[$i]->titre."</br>");
			echo('Description : '.$liste[$i]->description."</br>");
			echo('Date limite : '.$liste[$i]->expiration."</br>");
			echo('Token : '.$liste[$i]->token."</br>");
		}
	}

}
