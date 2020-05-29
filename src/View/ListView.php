<?php
namespace PHPProject\View;

use \PHPProject\Controller\UserController as UserController;
use \PHPProject\models\Liste as Liste;
use \PHPProject\Controller\ListController as ListController;
use \PHPProject\Controller\ItemController as ItemController;
use PHPProject\View\ItemView as ItemView;
use \PHPProject\View\Outils;

class ListView{

	public function affichageListe($user){
		Outils::headerHTML("Affichage de la liste");
		$app = \Slim\Slim::getInstance();
		$liste = Liste::select('*')->where ('user_id','=', $user->id)->get();//RETOURNE UN TABLEAU D'OBJETS
		$max = count($liste);

		echo("<div class='listeEntete'>Liste(s) de ".$user->login."</div>");//retourne le nom de l'utilisateur de la liste

		for ($i = 0; $i < $max; $i++) {
			echo('<h3>Titre : <i>'.$liste[$i]->titre."</i></h3></br>");
			echo('<b>Description :</b><i> '.$liste[$i]->description."</i></br>");
			echo('<b>Date limite :</b><i> '.$liste[$i]->expiration."</i></br>");
			echo('<b>Token :</b> <i>'.$liste[$i]->token."</i></br>");

			ItemController::affichageItems($liste[$i]->no);

			echo("<a href=".$app->urlFor('suppList',array('token' => $liste[$i]->no)).">Supprimer la liste</a>");
			
			$add = $app->urlFor('FormItem');
			echo ("<form action='$add'>
			<input type='submit' action='$add' value='Ajouter Item'>\n
			</form>");

		}
		$add = $app->urlFor('FormList');
		echo ("<form action='$add'>");
		$boutonAjouter = "<input type='submit' action='$add' value='Ajouter Liste'>\n"; 
		echo($boutonAjouter);
		echo("</form>");
		Outils::footerHTML();
	}

	public function aucuneListe(){
		Outils::headerHTML("Erreur");
		echo("<h2>Cet utilisateur n'a aucune liste</h2>");
		echo("Vous pouvez en ajouter une");

		$app = \Slim\Slim::getInstance();
		$add = $app->urlFor('FormList');
		echo ("<form action='$add'>");
		$boutonAjouter = "<input type='submit' action='$add' value='Ajouter Liste'>\n"; 
		echo($boutonAjouter);
		echo("</form>");
		Outils::footerHTML();
	}

	public function formulaireListe(){
		$slim = \Slim\Slim::getInstance();
		Outils::headerHTML("Création de liste");
		
		$add = $slim->urlFor('addList');
		echo("<h1>Formulaire de création d'une liste</h1>Veuillez remplir tous les champs suivants : </br><form action='$add' method = 'post'>
			  <label for=\"listTitre\">Titre de la liste: </label>
  			  <input type=\"text\" name='liste_titre'><br>
  			  <label for=\"descriptionListe\">Description de la liste: </label>
  		      <input type=\"text\" name='liste_description'><br>
  			  <label for=\"dateExp\">Date d'expiration: </label>
			  <input type=\"date\" name='liste_date'><br>
			  <label for=\"dateExp\">Propriétaire de la liste: </label>
  			  <input type=\"text\" name='liste_proprietaire'><br>
			  <input type=\"submit\" value=\"Submit\"></form>");
		Outils::footerHTML();
	}
}
?>
