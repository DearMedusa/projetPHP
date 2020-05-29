<?php


require_once 'vendor/autoload.php';
  
  //Imports
  use PHPProject\Controller\ListController as ListController;
  use PHPProject\Controller\UserController as UserController;
  use PHPProject\Controller\ItemController as ItemController;
  use PHPProject\models\Liste as Liste;
  use PHPProject\models\Item as Item;


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
  $app->get('/', function(){
    $uc=new UserController();
    $uc::EnteteUser(UserController::getUser(0));
  })->name('home');

  //affiche les differentes listes d'un utilisateur
  $app->get('/user', function(){
      $slim = \Slim\Slim::getInstance();
      $user = $slim->request->get()['user'];//check toutes les lignes de la table user
      $al= new ListController();//créer un listcontroller
      $al::affichageListe($user);//appel ListController.affichageListe
  })->name('repForm');

  // Suppression de liste
  $app->get('/supp(/:token)', function($token){
    $slim = \Slim\Slim::getInstance();
    $bi= new ListController();
    $bi::supprimerListe($token);
    $slim->redirect($slim->urlFor('home'));
  })->name('suppList');

    // Suppression d'item
  $app->get('/suppItem(/:token)', function($token){
    $slim = \Slim\Slim::getInstance();
    $si= new ItemController();
    $si::supprimerItem($token);
    $slim->redirect($slim->urlFor('home'));
  })->name('suppItem');

  // Formulaire d'ajout de liste
  $app->get('/user/FormList(/:token)', function($token){
    $lc = new ListController();
    $lc::affFormList($token);
  })->name('FormList');

 // Formulaire de réservation d'item
 $app->get('/user(/:token)', function($token){
    $controller = new ItemController();
    $controller->affBookForm($token);
  })->name('bookForm');

 // Réservation d'item
  $app->get('/user/item(/:token)', function($token){//NE FONCTIONNE PAS ENCORE
    $slim = \Slim\Slim::getInstance();
    $bi= new ItemController();
    //$item = Item::where(['id' => $token])->get();
    $bi::reservationItem($token);
    $slim->redirect($slim->urlFor('home'));
  })->name('booking');

  // Ajout de liste
  $app->post('/user/formList/addList', function(){
    $slim = \Slim\Slim::getInstance();
    $lc = new ListController();
    $lc::ajouterList();
    $slim->redirect($slim->urlFor('home'));
  })->name('addList');

  // Formulaire d'inscription
  $app->get('/inscription', function(){
    $slim = \Slim\Slim::getInstance();
    $al = new UserController();
    $al::inscription();
  })->name('inscription');

  // Formulaire de creation d'item
  $app->get('/FormItem', function(){
    $slim = \Slim\Slim::getInstance();
    $al = new ItemController();
    $al::affFormItem();
  })->name('FormItem');

  // Creation d'item
  $app->post('/user/addItem', function(){
    $slim = \Slim\Slim::getInstance();
    $lc = new ItemController();
    $lc::ajouterItem();
    $slim->redirect($slim->urlFor('home'));
  })->name('addItem');

  // Ajout d'user
  $app->post('/inscription/register', function(){
    $slim = \Slim\Slim::getInstance();
    $lc = new UserController();
    $lc::ajouterUser();
    $slim->redirect($slim->urlFor('home'));
  })->name('addUser');

  // Affichage des items d'une liste
  $app->get('/affItem', function(){//toujours utile ?
    $slim = \Slim\Slim::getInstance();
    $al = new ItemController();
    $al::affichageItem(1);
  })->name('affItem');

  $app->run();
?>