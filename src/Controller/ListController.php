
<?php
  require_once 'vendor/autoload.php';

  use \mywishlist\models\List as List;
  use \mywishlist\models\User as User;
  use \mywishlist\view\ListView as ListView;

  class ListController{
    
    //creation de liste
    public function createList(){
    
    }
    
    //edition de liste
    public function editList(){
    
    }
    
    //affichage de liste
    public function afficheList($id){
      //appel de listView avec en parametre la liste qui correspond à l'id $id
      $vue = new ListView();
      $vue->afficherListe(WishList::where('no','=',$id)->where('token','=',$token)->first())
    }
  
  }

?>
