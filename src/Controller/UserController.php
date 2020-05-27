<?php
  
namespace PHPProject\Controller;

use \PHPProject\models\User as User;
use \PHPProject\view\UserView as UserView;

class UserController{

	static function EnteteUser(){
	    UserView::EnteteUser();
	}

	static function inscription(){
	    UserView::inscription();
	}

	//Ajoute une ligne dans la base de donnée user
	function ajouterUser(){
		$slim = \Slim\Slim::getInstance();
		//echo("<script>".alert(1)."</script>");
		$acc=new User();
		$acc->login = $slim->request->post('acc_login');
		$acc->save();
		//requete SQL insert Into
	}

	static function getUser($id){  // voir comment palier session() !!!!!!
		$user = User::select('login')->where ('id','=', $id)->get();
		return $user;
	}
}
?> 
