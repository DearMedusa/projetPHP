<?php
  
  namespace PHPProject\Controller;

  require_once 'vendor/autoload.php';

  use \PHPProject\models\Liste as Liste;
  use \PHPProject\models\User as User;
  use \PHPProject\view\ListView as ListView;  // A voir pous "as"

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
    
    //edition de liste (LVL 2)
    public function editList(){
      // a voir plus tard
    }


    //retourne le proprietaire de la liste
    public function getListUser($id){
      $liste = Liste::where('no','=', $id)->first();
      return $liste->user_id; 
    }
    

    //affichage de liste
    public function affichageListe($id){
      //appel de listView avec en parametre la liste qui correspond à l'id $id
      $view = new ListView();
      $view->affichageListe(User::where('id','=', 1)->first());
    }

    public function supprimerListe($id){
    $view = new ListView();
    $list = Liste::where('no','=',$id)->first();
    $list->delete();
    }
  }

?>
