<?php
namespace PHPProject\View;
require_once 'vendor/autoload.php';
use \PHPProject\Controller\UserController as AccountController;


class ListView{

	public function affichageListe($liste){
		$app = \Slim\Slim::getInstance();
		echo('Titre : '.$liste["titre"]."</br>");
		echo('Description : '.$liste["description"]."</br>");
		echo('Date limite : '.$liste["expiration"]."</br>");
		echo('Token : '.$liste["token"]."</br>");
	}

}
