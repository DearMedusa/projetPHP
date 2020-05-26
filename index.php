<?php


require_once 'vendor/autoload.php';
  
  //Imports
  use PHPProject\Controller\ListController as ListController;
  use PHPProject\Controller\UserController as UserController;
  use PHPProject\Controller\ItemController as ItemController;
  use PHPProject\models\Liste as Liste;


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

  $app->post('/', function(){//NE FONCTIONNE PAS (trop)
    $slim = \Slim\Slim::getInstance();
    $lc= new ListController();
    $lc::supprimerListe(2);
  })->name('suppList');

  $app->post('/', function(){//NE FONCTIONNE PAS (trop)
    $slim = \Slim\Slim::getInstance();
    $lc= new ListController();
    //$lc::ajouterList();
  })->name('addList');

  $app->get('/inscription', function(){
    $slim = \Slim\Slim::getInstance();
    $al = new UserController();
    $al::inscription();
  })->name('inscription');

  $app->get('/affList', function(){//NE FONCTIONNE PAS (trop) ------------------------------
    $slim = \Slim\Slim::getInstance();
    //$list = Liste::where('id','=', $id)->first();
    //on veut afficher les items qui correspondent à la liste 
    //tout le pb réside ds le fait qu'on a aucun moyen de connaitre
    //la liste sur laquelle on est quand on appuis sur le bouton "afficher liste"
    $aff = new ItemController();
    $aff::affichageItem(2);
  })->name('affList');//mais quand on appuis sur le bouton 'afficher liste'....on est déja dans une liste précise !

  $app->run();

?>
