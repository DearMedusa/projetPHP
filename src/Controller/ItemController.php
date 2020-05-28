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
    function affichageItems($listid){
        $item = Item::where(['liste_id' => $listid])->get();
        $view = new ItemView();
        $view->affichageItems($item);
    }

    function affichageItem($listid){   //Affiche un item spécifique
      $item = Item::where(['liste_id' => $listid])->get();
      $view = new ItemView();
      $view->affichageItem($item);
  }

    function affFormItem(){
      $view = new ItemView();
      $view::affFormItem();
    }

    function affBookForm(){
      $view=new ItemView();
      $view::affBookForm();
    }




    function ajouterItem(){
        $slim = \Slim\Slim::getInstance();
        $item = new item();
        $item->nom = $slim->request->post('item_nom');
        $item->descr = $slim->request->post('item_description');
        $item->liste_id = $slim->request->post('liste_id');
        $item->tarif = $slim->request->post('item_tarif');
        $item->save();
      }



      function reservationItem(){
        
      }
  }
