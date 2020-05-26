<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Item as Item;
  use \PHPProject\models\Liste as Liste;
  use \PHPProject\view\ItemView as ItemView;
  use \PHPProject\models\User as User;
  use \PHPProject\view\ListView as ListView;
  use \PHPProject\controller\UserController as UserController;
  use \PHPProject\controller\ListController as ListController;

  class ItemController{


    //affiche les items d'une liste spécifiée
    function affichageItem($listid){
        $item = Item::where(['liste_id' => $listid])->get();
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
