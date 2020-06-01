<?php
  
namespace PHPProject\Controller;

use \PHPProject\models\User as User;
use \PHPProject\view\UserView as UserView;

class UserController{

	// Appelle l'affichage de l'entête utilisateur
	static function EnteteUser(){
	    UserView::EnteteUser();
	}

	// Appelle l'affichage du formulaire d'inscription
	static function inscription(){
	    UserView::inscription();
	}

	public function supprimerUser($id){
		$slim = \Slim\Slim::getInstance();
		$user = User::where('id','=',$id)->first();
		$user->delete();  
	}

	// Ajoute une ligne dans la base de donnée user
	function ajouterUser(){
		$slim = \Slim\Slim::getInstance();
		$acc=new User();
		$acc->login = $slim->request->post('acc_login');//le nom du bouton
		$acc->save();
	}

	// Retourne un utilisateur spécifié
	static function getUser($id){
		$user = User::select('login')->where ('id','=', $id)->get();
		return $user;
	}
}
?> 
