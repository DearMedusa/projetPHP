<?php
  
  namespace PHPProject\Controller;

  require_once 'vendor/autoload.php';

  use \mywishlist\models\List as List;  // A voir pous "as"
  use \mywishlist\models\User as User;  // A voir pous "as"
  use \mywishlist\view\ListView as ListView;  // A voir pous "as"

  class ListController{
    
    //creation de liste
    public function createList(){
      $view = new ListView();
      $user = AccountController::getCurrentUser();

      $liste = new List();
      $wishlist->user_id = $user->id_account;
      $wishlist->titre =  $_POST['nom_liste'];
      $wishlist->description = $_POST['dexcription_liste'];

      $list->save(){
        $view->affichage($list, $user)
      }
    }
    
    //edition de liste
    public function editList(){
    // a voir plus tard
    }
    

    
    //affichage de liste
    public function affichageList($id){
      //appel de listView avec en parametre la liste qui correspond à l'id $id
      $view = new ListView();
      $view->affichageList(List::where('no','=',$id)->first())
    }


    public function supprimerList($id){
    $view = new ListView();
    $list = List::where('no','=',$id)->first();
    
    $list->delete());
    }
  }

?>
