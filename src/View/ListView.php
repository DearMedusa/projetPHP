<?php
namespace PHPProject\View;

use \PHPProject\Controller\UserController as UserController;
use \PHPProject\Controller\ListController as ListController;
use \PHPProject\Controller\ItemController as ItemController;
use \PHPProject\View\ItemView as ItemView;
use \PHPProject\View\Outils as Outils;
use \PHPProject\models\Liste as Liste;

class ListView{

	// Affiche toutes les listes d'un utilisateur
	public function affichageListe($user){
		Outils::headerHTML("Affichage de la liste");
		$app = \Slim\Slim::getInstance();
		$liste = Liste::select('*')->where ('user_id','=', $user->id)->get();//get retourne un tableau d'objet
		$max = count($liste);

		echo("<div class='listeEntete'>Liste(s) de ".$user->login."</div>");

		for ($i = 0; $i < $max; $i++) {//Pour toutes les listes d' l'utilisateur
			echo('<h3>Titre : <i>'.$liste[$i]->titre."</i></h3></br>");
			echo('<b>Description :</b><i> '.$liste[$i]->description."</i></br>");
			echo('<b>Date limite :</b><i> '.$liste[$i]->expiration."</i></br>");
			echo('<b>Token :</b> <i>'.$liste[$i]->token."</i></br>");

			ItemController::affichageItems($liste[$i]->no);

			echo("<a href=".$app->urlFor('ListFormMod',array('token' => $liste[$i]->no)).">Modifier la liste</a>");
			echo("<a href=".$app->urlFor('FormItem',array('token' => $liste[$i]->no)).">Ajouter un item</a>");
			echo("<a href=".$app->urlFor('suppList',array('token' => $liste[$i]->no)).">Supprimer la liste</a>"); 
		}
		echo("<a href=".$app->urlFor('FormList',array('token' => $user->id)).">Ajouter une liste</a>");
		echo("<a href=".$app->urlFor('suppUser',array('token' => $user->id)).">Supprimer ce compte</a>"); 
		Outils::footerHTML();
	}

	public function affichageAllPublic($tab){
		Outils::headerHTML("Affichage de la liste");
		$app = \Slim\Slim::getInstance();
		$max = count($tab);

		echo("<div class='listeEntete'>Liste(s) publique(s)</div>");

		for ($i = 0; $i < $max; $i++) {//Pour toutes les listes d' l'utilisateur
			echo('<h3>Titre : <i>'.$tab[$i]->titre."</i></h3></br>");
		}
		Outils::footerHTML();
	}

	// Affichage du formulaire de création de liste
	public function formulaireListe($id){
		Outils::headerHTML("Création de liste");
		$slim = \Slim\Slim::getInstance();
		$add = $slim->urlFor('addList');
		echo("<h1>Formulaire de création d'une liste</h1>Veuillez remplir tous les champs suivants : </br><form action='$add' method = 'post'>
			<div class='encadrementItem'><label for=\"listTitre\">Titre de la liste: </label>
			<input type=\"text\" name='liste_titre'><br>
			<label for=\"descriptionListe\">Description de la liste: </label>
			<input type=\"text\" name='liste_description'><br>
			<label for=\"dateExp\">Date d'expiration: </label>
			<input type=\"date\" name='liste_date'><br>
			<label for=\"dateExp\">Propriétaire de la liste: </label>
			<input type=\"text\" name='liste_proprietaire' value=$id><br>
			<label for=\"checkbox\">Publique: </label><br>
			<input type=\"checkbox\" name=\"liste_publique\" value = '1'><br>
			<input type=\"submit\" value=\"Valider\">
			</form></div>");
		Outils::footerHTML();
		}

	// Page d'erreur quand aucune liste n'est trouvée
	public function aucuneListe($user){
		Outils::headerHTML("Erreur");
		echo("<h2>Cet utilisateur n'a aucune liste</h2>");
		echo("Vous pouvez en ajouter une: ");
		$app = \Slim\Slim::getInstance();
		echo("<a href=".$app->urlFor('FormList',array('token' => $user->id)).">Ajouter une liste</a>");
		echo("<a href=".$app->urlFor('suppUser',array('token' => $user->id)).">Supprimer ce compte</a>");  
		Outils::footerHTML();
	}

	public function affModFormList($id){
		Outils::headerHTML("Modification de liste");
		$slim = \Slim\Slim::getInstance();
		$list = Liste::where('no','=',$id)->first();
		$add = $slim->urlFor('modList',array('token' => $id));
		echo("<h1>Formulaire de création d'une liste</h1>Veuillez remplir tous les champs suivants : </br><form action='$add' method = 'post'>
			<label for=\"listTitre\">Titre de la liste: </label>
			<input type=\"text\" name='liste_titre' value = '$list->titre'><br>
			<label for=\"descriptionListe\">Description de la liste: </label>
			<input type=\"text\" name='liste_description' value = '$list->description'><br>
			<label for=\"dateExp\">Date d'expiration: </label>
			<input type=\"date\" name='liste_date' value = '$list->expiration'><br>
			<label for=\"dateExp\">Propriétaire de la liste: </label>
			<input type=\"text\" name='liste_proprietaire' value=$id><br>
			<label for=\"checkbox\">Publique: </label>
			<input type=\"checkbox\" name=\"liste_publique\" value ='1' ><br>
			<input type=\"submit\" value=\"Modifier\">
			</form>");
		Outils::footerHTML();
	}

}
?>
