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
  $uc = new UserController();
  $uc::EnteteUser(UserController::getUser(0));
})->name('home');

// Affichage des différentes listes d'un utilisateur
$app->get('/user', function(){
  $slim = \Slim\Slim::getInstance();
  $user = $slim->request->get()['user'];
  $al = new ListController();
  $al::affichageListe($user);
})->name('repForm');

// Suppression de liste
$app->get('/supp(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $sl = new ListController();
  $sl::supprimerListe($token);
  $slim->redirect($slim->urlFor('home'));
})->name('suppList');

// Suppression d'item
$app->get('/suppItem/(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $si = new ItemController();
  $si::supprimerItem($token);
})->name('suppItem');

// Suppression d'user
$app->get('/suppUser/(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $si = new UserController();
  $si::supprimerUser($token);
  $slim->redirect($slim->urlFor('home'));
})->name('suppUser');

// Formulaire de modification d'item
$app->get('/modForm(:token)', function($token){
  $fr = new ItemController();
  $fr->affModFormItem($token);
})->name('modForm');

// Modification d'item
$app->post('/modForm/item(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $mi = new ItemController();
  $mi::modifierItem($token);
  $slim->redirect($slim->urlFor('home'));
})->name('modItem');

// Formulaire de modification de liste
$app->get('/ListFormMod(:token)', function($token){
  $fr = new ListController();
  $fr->affModFormList($token);
})->name('ListFormMod');

// Modification de liste
$app->post('/ListFormMod/List(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $ax = new ListController();
  $ax::modifierList($token);
  $slim->redirect($slim->urlFor('home'));
})->name('modList');

// Formulaire d'ajout de liste
$app->get('/FormList(:token)', function($token){
  $af = new ListController();
  $af::affFormList($token);
})->name('FormList');

// Formulaire de réservation d'item
$app->get('/book(:token)', function($token){
  $fr = new ItemController();
  $fr->affBookForm($token);
})->name('bookForm');

// Réservation d'item
$app->get('/user/item(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $ri = new ItemController();
  $ri::reservationItem($token);
  $slim->redirect($slim->urlFor('home'));
})->name('booking');

// Ajout de liste
$app->post('/addList', function(){
  $slim = \Slim\Slim::getInstance();
  $aj = new ListController();
  $aj::ajouterList();
  $slim->redirect($slim->urlFor('home'));
})->name('addList');

// Formulaire d'inscription
$app->get('/inscription', function(){
  $slim = \Slim\Slim::getInstance();
  $in = new UserController();
  $in::inscription();
})->name('inscription');

// Formulaire de création d'item
$app->get('/FormItem(:token)', function($token){
  $slim = \Slim\Slim::getInstance();
  $it = new ItemController();
  $it::affFormItem($token);
})->name('FormItem');

// Création d'item
$app->post('/user/addItem', function(){
  $slim = \Slim\Slim::getInstance();
  $aj = new ItemController();
  $aj::ajouterItem();
  $slim->redirect($slim->urlFor('home'));
})->name('addItem');

// Ajout d'user
$app->post('/inscription/register', function(){
  $slim = \Slim\Slim::getInstance();
  $au = new UserController();
  $au::ajouterUser();
  $slim->redirect($slim->urlFor('home'));
})->name('addUser');

// Affichage des items d'une liste
$app->get('/affItem', function(){
  $slim = \Slim\Slim::getInstance();
  $ail = new ItemController();
  $ail::affichageItem(1);
})->name('affItem');

// Affichage de tous les items
$app->get('/allItems', function(){
  $slim = \Slim\Slim::getInstance();
  $ail = new ItemController();
  $ail::affichageAllItems();
})->name('allItems');

// Affichage de toutes les listes publiques
$app->get('/affPubList', function(){
  $slim = \Slim\Slim::getInstance();
  $ail = new ListController();
  $ail::affichageAllPublic();
})->name('affPubList');

$app->run();
?>
