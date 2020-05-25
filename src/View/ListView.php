<?php
namespace PHPProject\View;
require_once 'vendor/autoload.php';
use \PHPProject\Controller\UserController as AccountController;


class ListView{

	public function affichageListe($liste){
		$app = \Slim\Slim::getInstance();

		echo("<h1>".$liste->user_id."</h1>");//retourne le nom de l'utilisateur de la liste
		//si ça ne marche pas, utiliser Liste::getListUser();

		echo('Titre : '.$liste["titre"]."</br>");
		echo('Description : '.$liste["description"]."</br>");
		echo('Date limite : '.$liste["expiration"]."</br>");
		echo('Token : '.$liste["token"]."</br>");
	}

}
