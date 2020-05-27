<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Liste as Liste;
  use \PHPProject\models\User as User;
  use \PHPProject\models\Item as Item;
  use \PHPProject\View\ListView as ListView;  // A voir pous "as"

  class ListController{
    
    //creation de liste
    public function createList(){
      $view = new ListView();
      $user = AccountController::getCurrentUser();

      $liste = new Liste();
      $liste->user_id = $user->id_account;
      $liste->titre =  $_POST['nom_liste'];//nom_liste = nom du bouton
      $liste->description = $_POST['description_liste'];

      $list->save();
      $view->affichageListe($list);//ListeView.affichageListe();
      
    }

    public function ajouterList(){
      $view = new ListView();
      $view->formulaireListe();
    }

    //edition de liste (LVL 2)
    public function editList(){
      // a voir plus tard
    }

    public function getListUser($idList){
      $liste = Liste::where('no','=', $idList)->first();
      return $liste->user_id; 
    }

    //cette fonction nous permet d'afficher les items d'une liste sans connaitre le user
    /*public function getItems($idList) {// A TESTER---------------------------------------
      $item = Item::where('liste_id','=', $idList)->get();
      return $item; 
    }*/


    //affichage de liste
    public function affichageListe($idUser){
      //appel de listView avec en parametre la liste qui correspond à l'id $id
      $view = new ListView();
      $wishlist = Liste::where('user_id','=',$idUser)->first();
      if ($wishlist != null){
        $view->affichageListe(User::where('id','=', $idUser)->first());
      }else{
        $view->aucuneListe();
      }
    }

    // Suppression de liste
    public function supprimerListe($id){
      //quelquepart là dedans il va falloir tricher pour pouvoir récuperer l'id de la liste à supprimer
    $view = new ListView();
    $list = Liste::where('no','=',$id)->first();
    $list->delete();
    }
  }

?>
