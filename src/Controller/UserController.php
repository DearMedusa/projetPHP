<?php
  
namespace PHPProject\Controller;

use \PHPProject\models\User as User;
use \PHPProject\view\UserView as UserView;


class UserController{

	static function EnteteUser(){
	    UserView::EnteteUser();
	}

	static function getUser($id){  // voir comment palier session() !!!!!!
		$user = User::select('login')->where ('id','=', 1)->get();
		return $user;
	}


}

?> 
