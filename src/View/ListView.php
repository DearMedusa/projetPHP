<?php
namespace PHPProject\View;

use \PHPProject\Controller\UserController as UserController;
use \PHPProject\models\Liste as Liste;
use \PHPProject\Controller\ListController as ListController;
use \PHPProject\Controller\ItemController as ItemController;
use PHPProject\View\ItemView as ItemView;

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
			$boutonSupprimer = "<input type='submit' value='Supprimer Liste'>\n"; 
			$supp = $app->urlFor('suppList');

			ItemController::affichageItems($liste[$i]->no);

			$add = $app->urlFor('addList');
			echo ("<form action='$add'>");
			$boutonAjouter = "<input type='submit' action='$add' value='Ajouter Liste'>\n"; 
			echo($boutonAjouter);
			echo("</form>");

			$boutonSupprimer.= $supp;
			echo($boutonSupprimer);
		}
	}

	public function formulaireListe(){
		echo("<h1>Formulaire de création d'une liste</h1>");

		echo("Veuillez remplir tous les champs suivants : </br>");

		echo("<label for=\"listTitre\">Titre de la liste: </label>
  			  <input type=\"text\"><br>
  			  <label for=\"descriptionListe\">Description de la liste: </label>
  		      <input type=\"text\"><br>
  			  <label for=\"dateExp\">Date d'expiration: </label>
  			  <input type=\"date\"><br>
			  <input type=\"submit\" value=\"Submit\">
			  <label for=\"dateExp\">Propriétaire de la liste: </label>");
	}
}
?>
