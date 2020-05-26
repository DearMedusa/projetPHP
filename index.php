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
    $uc::EnteteUser(UserController::getUser(0));
  })->name('home');


$app->get('/user', function(){
    $slim = \Slim\Slim::getInstance();
    $user = $slim->request->get()['user'];//check toutes les lignes de la table user
    $al= new ListController();//créer un listcontroller
    $al::affichageListe($user);//appel ListController.affichageListe
})->name('repForm');

  $app->run();

?>
