<?php
  namespace mywishlist\view;

  class UserView{
  	public static function EnteteUser($user){

      $content = "";
      $app = \Slim\Slim::getInstance();

      $content = "\n";
        $content .= "  <!-- Connection form -->\n";
        $content .= "  <form id='connectionForm' method='post' action='" . $app->urlFor("acc_auth") . "'>\n";
        $content .= "    <input required placeholder='Login' type='text' name='acc_login'>\n";
        $content .= "    <input type='submit' value='Connexion'>\n";
        $content .= "    <a id='inscriptionLink' href='".$app->urlFor('acc_create_get')."'>Inscription</a>\n";
        $content .= "  </form>\n";
  	}
  }
