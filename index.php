
<?php
  
  //Imports
  use listcontroller;
  use itemcontroller;
  use usercontroller;

  // Base de données
  use Illuminate\Database\Capsule\Manager as DB;
  $db = new DB();
  $db->addConnection(parse_ini_file('src/conf/db.config.ini'));
  $db->setAsGlobal();
  $db->bootEloquent();

  //Eloquent
  session_start();

  //Slim
  $app = new \Slim\Slim();

  // Affichage de listes
  $app->get('/', function(){
    $listController = new ListController();
    $listController->displayObjects();
  })->name('home');
  
  $app->run();
?>
