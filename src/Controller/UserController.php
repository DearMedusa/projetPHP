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
		//INSERT INTO
		$acc->login = $slim->request->post('acc_login');//le nom du bouton
		$acc->save();
	}

	static function getUser($id){  // voir comment palier session() !!!!!!
		$user = User::select('login')->where ('id','=', $id)->get();
		return $user;
	}
}
?> 
