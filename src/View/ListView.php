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
		$liste = Liste::select('*')->where ('user_id','=', $user->id)->get();//RETOURNE UN TABLEAU D'OBJETS
		$max = count($liste);

		echo("<h1> Liste(s) de ".$user->login."</h1>");//retourne le nom de l'utilisateur de la liste

		for ($i = 0; $i < $max; $i++) {
			echo('<h2>Titre : '.$liste[$i]->titre."</h2></br>");
			echo('Description : '.$liste[$i]->description."</br>");
			echo('Date limite : '.$liste[$i]->expiration."</br>");
			echo('Token : '.$liste[$i]->token."</br>");

			ItemController::affichageItems($liste[$i]->no);

			$supp = $app->urlFor('suppList');
			echo ("<form action='$supp'>");
			$boutonSupprimer = "<input type='submit' action='$supp' value='Supprimer Liste'>\n"; 
			echo($boutonSupprimer);
			echo("</form>");

			$add = $app->urlFor('FormList');
			echo ("<form action='$add'>");
			$boutonAjouter = "<input type='submit' action='$add' value='Ajouter Liste'>\n"; 
			echo($boutonAjouter);
			echo("</form>");

		}
	}

	public function aucuneListe(){
		echo("<h1>Cet utilisateur n'a aucune liste</h1>");
		$app = \Slim\Slim::getInstance();
		$add = $app->urlFor('FormList');
		echo ("<form action='$add'>");
		$boutonAjouter = "<input type='submit' action='$add' value='Ajouter Liste'>\n"; 
		echo($boutonAjouter);
		echo("</form>");

	}

	public function formulaireListe(){
		$slim = \Slim\Slim::getInstance();
		echo("<h1>Formulaire de création d'une liste</h1>");
		echo("Veuillez remplir tous les champs suivants : </br>");

		$add = $slim->urlFor('addList');
		echo("<form action='$add' method = 'post'>
			  <label for=\"listTitre\">Titre de la liste: </label>
  			  <input type=\"text\" name='liste_titre'><br>
  			  <label for=\"descriptionListe\">Description de la liste: </label>
  		      <input type=\"text\" name='liste_description'><br>
  			  <label for=\"dateExp\">Date d'expiration: </label>
			  <input type=\"date\" name='liste_date'><br>
			  <label for=\"dateExp\">Propriétaire de la liste: </label>
  			  <input type=\"text\" name='liste_proprietaire'><br>
			  <input type=\"submit\" value=\"Submit\">");
	}
}
?>
