<?php
  namespace PHPProject\View;
  require_once 'vendor/autoload.php';

  use \PHPProject\models\User;
  use \PHPProject\conf\ConnectionFactory;
  use \PHPProject\View\Outils;

ConnectionFactory::setConfig('conf.ini');
ConnectionFactory::makeConnection();

  class UserView{
  public static function EnteteUser(){//affiche le formulaire de connexion/d'inscription
  Outils::headerHTML("Page principale");


      $content = "";
      $app = \Slim\Slim::getInstance();
      $action = $app->urlFor('repForm');
      $content = "\n";
      $content .= "  <!-- Connection form -->\n";
      echo("<div class='HomeEntete'>Connexion</div>");
      echo "<form method='GET' action='$action'>
            <select name='user'>
            <option value=''>Choisir un utilisateur</option>";
      $Liste = User::select('login', 'id')->get(); // il s'agit de la classe 

      foreach ($Liste as $rangee){//pour toutes les listes de l'utilisateur
        $UserId=$rangee["id"];
        $nomUser=$rangee["login"];
        echo "<option value='".$UserId."'>".$nomUser."</option> \n";//une option par user
      }

      $content .= "<input type='submit' value='Connexion'></br>\n";
      $content .= "<i>Vous n'avez pas de compte ? </i><a id='inscriptionLink' href='".$app->urlFor('inscription')."'>Inscrivez vous</a>\n";
      $content .= "</form>\n";
      echo $content;
      Outils::footerHTML();
    }
    
    public static function inscription(){
      Outils::headerHTML("Inscription");
      $slim = \Slim\Slim::getInstance();
      $login = '';
      echo("<h1>Formulaire d'Inscription</h1>");
      echo("Veuillez remplir le champ suivant : </br>");
      //---------------------------------------------------------------------------------------------------------------------
      $add = $slim->urlFor('addUser');//action du bouton (changer l'URL)
      echo ("<form action='$add' method = 'post'>
      <label for=\"listTitre\">Login: </label>
      <input required type='text' placeholder='Login' name='acc_login' value='$login'></br>
      <input type='submit' value='Enregistrer'>\n
      </form>");//fin du formulaire
      Outils::footerHTML();
    }
  }
