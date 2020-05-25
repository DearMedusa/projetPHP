<?php
  
  namespace PHPProject\Controller;

  use \mywishlist\models\Item as Item;
  use \mywishlist\models\WishList as WishList;
  use \mywishlist\view\ItemView as ItemView;
  use \mywishlist\models\Account as Account;
  use \mywishlist\view\ListView as ListView;
  use \mywishlist\controller\AccountController as AccountController;

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
