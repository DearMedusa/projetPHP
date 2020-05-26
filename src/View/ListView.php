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
		
		echo("<h1> Liste(s) de ".$user->login."</h1>");//retourne le nom de l'utilisateur de la liste
		echo('Titre : '.$liste[0]->titre."</br>");
		echo('Description : '.$liste[0]->description."</br>");
		echo('Date limite : '.$liste[0]->expiration."</br>");
		echo('Token : '.$liste[0]->token."</br>");
	}

}
