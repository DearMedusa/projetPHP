<?php
namespace PHPProject\View;
require_once 'vendor/autoload.php';

use \PHPProject\models\User as User;
use \PHPProject\conf\ConnectionFactory;
use \PHPProject\View\Outils as Outils;
ConnectionFactory::setConfig('conf.ini');
ConnectionFactory::makeConnection();

class UserView{
  
  // Affiche le formulaire de connexion
  public static function EnteteUser(){
    Outils::headerHTML("Page principale");
    $app = \Slim\Slim::getInstance();
    $action = $app->urlFor('repForm');
    echo("<div class='HomeEntete'>Connexion</div>");
    echo "<div class ='cadreConnexion'><form method='GET' action='$action'>
          <select name='user'>
          <option value=''>Choisir un utilisateur</option>";
    $Liste = User::select('login', 'id')->get();

    foreach ($Liste as $rangee){//pour chaque utilisateur
      $UserId = $rangee["id"];
      $nomUser = $rangee["login"];
      echo "<option value='".$UserId."'>".$nomUser."</option> \n";//une option par utilisateur
      }

    echo("<input type='submit' value='Connexion'></br>");
    echo("<i>Vous n'avez pas de compte ? </i><a id='inscriptionLink' href='".$app->urlFor('inscription')."'>Inscrivez vous</a>");
    echo("</form></div>");
    
    echo("<div class ='cadre'>");
    echo("<a id='inscriptionLink' href='".$app->urlFor('allItems')."'>Consulter les objets existants</a>");
    echo("</div>");

    Outils::footerHTML();
    }
    
  // Affichage du formulaire d'inscription
  public static function inscription(){
    Outils::headerHTML("Inscription");
    $slim = \Slim\Slim::getInstance();
    $login = '';
    echo("<h1>Formulaire d'Inscription</h1>");
    echo("Veuillez remplir le champ suivant : </br>");
    $add = $slim->urlFor('addUser');//action du bouton (changer l'URL)
    echo ("<form action='$add' method = 'post'>
      <label for=\"listTitre\">Login: </label>
      <input required type='text' placeholder='Login' name='acc_login' value='$login'></br>
      <input type='submit' value='Enregistrer'>
      </form>");
    Outils::footerHTML();
    }
  }
