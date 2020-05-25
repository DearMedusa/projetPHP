<?php
  
namespace PHPProject\Controller;

use \mywishlist\models\Account as Account;
use \mywishlist\view\AccountView as AccountView;


class UserController{

	static function EnteteUser(){
		$content = "";
	    UserView::EnteteUser(UserController::getUser());
	}



	static function getUser($id){  // voir comment palier session() !!!!!!
		$user = Account::where('user_id','=', 1)->first();
		return $user;
	}

}

?> 
