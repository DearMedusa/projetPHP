<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Item as Item;
  use \PHPProject\models\Liste as Liste;
  use \PHPProject\models\User as User;
  use \PHPProject\view\ItemView as ItemView;
  use \PHPProject\view\ListView as ListView;
  use \PHPProject\controller\UserController as UserController;
  use \PHPProject\controller\ListController as ListController;

  class ItemController{

    // Affiche les items d'une liste spécifiée
    function affichageItems($listid){
        $item = Item::where(['liste_id' => $listid])->get();
        $view = new ItemView();
        $view->affichageItems($item);
    }

    // Affiche un item spécifique
    function affichageItem($listid){
      $item = Item::where(['liste_id' => $listid])->get();
      $view = new ItemView();
      $view->affichageItem($item);
  }

    // Affiche le formulaire de création d'item
    function affFormItem($id){
      $view = new ItemView();
      $view::affFormItem($id);
    }

    // Affiche le formulaire de réservation
    function affBookForm($id){
      $view=new ItemView();
      $view::affBookForm($id);
    }

    // Affichage de tous les items de la bdd
    function affichageAllItems(){
      $view=new ItemView();
      $view::affichageAllItems();
    }

    function affModFormItem($id){
      $view=new ItemView();
      $view::affModFormItem($id);
    }

    // Ajoute une ligne à la base de donnée dans la table item
    function ajouterItem(){
        $slim = \Slim\Slim::getInstance();
        $item = new item();
        $item->nom = $slim->request->post('item_nom');
        $item->descr = $slim->request->post('item_description');
        $item->liste_id = $slim->request->post('liste_id');
        $item->tarif = $slim->request->post('item_tarif');
        $item->lien = $slim->request->post('item_lien');
        $item->save();
      }

      // Ajoute une ligne à la base de donnée dans la table item
    function modifierItem($id){
      $slim = \Slim\Slim::getInstance();
      $item = Item::where(['id' => $id])->first();
      $item->nom = $slim->request->post('itemMod_nom');
      $item->descr = $slim->request->post('itemMod_description');
      //$item->img = $slim->request->post('itemMod_img');
      $item->tarif = $slim->request->post('itemMod_tarif');
      $item->lien = $slim->request->post('item_lien');
      $item->save();
    }

    // Modifie l'attribut "reservation" d'un item spécifique
    function reservationItem($id){
      $slim = \Slim\Slim::getInstance();
      $item = Item::where(['id' => $id])->first();
      $item->reservation = "Oui";
      $item->save();
    }

    // Supprime un item à l'id spécifique
    function supprimerItem($id){
      $slim = \Slim\Slim::getInstance();
      $item = Item::where('id','=',$id)->first();
      if(isset($item->reservation)){
        $view = new ItemView();
        $view->ErreurBooked();
      }else{
        $item->delete();
        $slim->redirect($slim->urlFor('home'));
      }
    }
  }
