<?php
  
  namespace PHPProject\Controller;

  use \PHPProject\models\Liste as Liste;
  use \PHPProject\models\User as User;
  use \PHPProject\View\ListView as ListView;

  class ListController{
    
    // Ajout d'une ligne dans la table "liste"
    public function ajouterList(){
      $slim = \Slim\Slim::getInstance();
      $list = new Liste();
      $list->titre = $slim->request->post('liste_titre');
      $list->description = $slim->request->post('liste_description');
      $list->user_id = $slim->request->post('liste_proprietaire');
      $list->expiration = $slim->request->post('liste_date');
      $list->save();
    }

    // Appelle l'affichage du formulaire de création de liste
    public function affFormList($id){
      $view = new ListView();
      $view->formulaireListe($id);
    }

    // Appelle l'affichage du formulaire de modification de liste
    function affModFormList($id){
      $view=new ListView();
      $view::affModFormList($id);
    }

    // Modifie une ligne à la base de donnée dans la table liste
    function modifierList($id){
      $slim = \Slim\Slim::getInstance();
      $list = Liste::where(['no' => $id])->first();
      $list->titre = $slim->request->post('liste_titre');
      $list->description = $slim->request->post('liste_description');;
      $list->expiration = $slim->request->post('liste_date');
      $list->save();
    }

    // Retourne le propriétaire d'une liste spécifique
    public function getListUser($idList){
      $liste = Liste::where('no','=', $idList)->first();
      return $liste->user_id; 
    }

    // Affichage d'une liste spécifique
    public function affichageListe($idUser){
      //appel de listView avec en parametre la liste qui correspond à l'id $id
      $view = new ListView();
      $wishlist = Liste::where('user_id','=',$idUser)->first();
      $user = User::where('id','=',$idUser)->first();
      if ($wishlist != null){//si une liste est trouvée
        $view->affichageListe(User::where('id','=', $idUser)->first());
      }else{//sinon afficher une erreur
        $view->aucuneListe($user);
      }
    }

    // Suppression de la liste spécifiée
    public function supprimerListe($id){
      $list = Liste::where('no','=',$id)->first();
      $list->delete();
    }
  }
?>
