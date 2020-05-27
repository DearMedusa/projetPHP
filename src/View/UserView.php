<?php
  namespace PHPProject\View;
  require_once 'vendor/autoload.php';

  use \PHPProject\models\User;
  use \PHPProject\conf\ConnectionFactory;

ConnectionFactory::setConfig('conf.ini');
ConnectionFactory::makeConnection();

  class UserView{
  	public static function EnteteUser(){//affiche le formulaire de connexion/d'inscription

      $content = "";
      $app = \Slim\Slim::getInstance();
      $action = $app->urlFor('repForm');
      $content = "\n";
      $content .= "  <!-- Connection form -->\n";
      echo "<form method='GET' action='$action'>
            <select name='user'>
            <option value=''>Choisir un utilisateur</option>";
      $Liste = User::select('login', 'id')->get(); // il s'agit de la classe 

      foreach ($Liste as $rangee){//pour toutes les listes de l'utilisateur
        $UserId=$rangee["id"];
        $nomUser=$rangee["login"];
        echo "<option value='".$UserId."'>".$nomUser."</option> \n";//une option par user
      }

      $content .= "    <input type='submit' value='Connexion'>\n";
      $content .= "    <a id='inscriptionLink' href='".$app->urlFor('inscription')."'>Inscription</a>\n";
      $content .= "  </form>\n";
      echo $content;
    }
    
    public static function inscription(){
      echo("<h1>Formulaire d'Inscription</h1>");

		echo("Veuillez remplir tous les champs suivants : </br>");

		echo("<label for=\"listTitre\">Login: </label>
          <input type=\"text\"></br>
          <input type=\"submit\" value=\"S'enregistrer\">");
    }
  }
