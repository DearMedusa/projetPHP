<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Liste as Liste;
  use \PHPProject\models\User as User;
  use \PHPProject\models\Item as Item;
  use \PHPProject\View\ListView as ListView;  // A voir pous "as"

  class ListController{
    
    //creation de liste
    public function ajouterList(){
      $slim = \Slim\Slim::getInstance();
      $list = new Liste();
      $list->titre = $slim->request->post('liste_titre');
      $list->description = $slim->request->post('liste_description');
      $list->user_id = $slim->request->post('liste_proprietaire');
      $list->expiration = $slim->request->post('liste_date');
      $list->save();
    }

    public function affFormList(){
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

    // Suppression de la liste spécifiée
    //public function supprimerListe($id){
    //$list = Liste::where('no','=',$id)->first();
    //$list->delete();
    //}
  }

?>
