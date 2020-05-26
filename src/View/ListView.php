<?php
namespace PHPProject\View;

require_once 'vendor/autoload.php';
use \PHPProject\Controller\UserController as UserController;
use \PHPProject\models\Liste as Liste;


class ListView{

	public function affichageListe($user){
		$app = \Slim\Slim::getInstance();
		Liste::getListUser(2);
		$liste = $user['liste_id'];//ici on doit récuperer la liste de $user
		echo("<h1> Liste(s) de ".$user->login."</h1>");//retourne le nom de l'utilisateur de la liste
		echo('Titre : '.$liste["titre"]."</br>");
		echo('Description : '.$liste["description"]."</br>");
		echo('Date limite : '.$liste["expiration"]."</br>");
		echo('Token : '.$liste["token"]."</br>");
	}

	//User: {id, login, liste_id}
	//User.id = 1;
	//user.login
}
