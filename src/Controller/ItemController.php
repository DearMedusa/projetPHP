<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Item as Item;
  use \PHPProject\models\Liste as Liste;
  use \PHPProject\view\ItemView as ItemView;
  use \PHPProject\models\User as User;
  use \PHPProject\view\ListView as ListView;
  use \PHPProject\controller\UserController as UserController;

  class ItemController{

	function affichageItem($id){
      $item = Item::where(['id' => $id])->first();

      //Affiche l'item via la vue
      $view = new ItemView();
      $view->affichageItem($item);
  }

  function creerItem($list_id){
  	 $view = new ItemView();
     $item = new Item();


    $item->nom = $_POST ['itemName'];
    $item->descr= $_POST['itemDescr'];
    $item->tarif=$_POST['itemTarif'];

    $item->liste_id = $list_id;

    $item->save();
    $view->affichageItem($item);
  	}
  }
