<?php
  namespace PHPProject\View;

  class UserView{
  	public static function EnteteUser(){//affiche le formulaire de connexion/d'inscription

      $content = "";
      $app = \Slim\Slim::getInstance();

      $content = "\n";
        $content .= "  <!-- Connection form -->\n";
        $content .= "  <form id='connectionForm' method='post' action='" . $app->urlFor("connect") . "'>\n";
        $content .= "  <input required placeholder='Login' type='text' name='connect'>\n";

        $content .= "  <input type='submit' value='Connexion'>\n";

        $content .= "  <a id='inscriptionLink' href='".$app->urlFor('home')."'>Inscription</a>\n";
        $content .= "  </form>\n";
        echo $content;
  	}
  }
