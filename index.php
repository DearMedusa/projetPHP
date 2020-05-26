<?php


require_once 'vendor/autoload.php';
  
  //Imports
  use PHPProject\Controller\ListController;
  use PHPProject\Controller\UserController;
  use PHPProject\Controller\ItemController;


  // Base de données
  use Illuminate\Database\Capsule\Manager as DB;
  $db = new DB();
  $db->addConnection(parse_ini_file('src/conf/conf.ini'));
  $db->setAsGlobal();
  $db->bootEloquent();

  //Eloquent
  session_start();

  //Slim
  $app = new \Slim\Slim();

  // Affichage de l'interface de connexion
  $app->get('/', function(){  //get ou post
    $uc=new UserController();
    $uc::EnteteUser(UserController::getUser(0));//nous affiche le user 1 (le parametre est useless)
  })->name('home');

  // Affichage de la liste id = 1
  $app->get('/liste', function(){  //get ou post
    $lc=new ListController();
    $lc::affichageListe(1);
   })->name('liste_aff');
  
  $app->run();

?>
