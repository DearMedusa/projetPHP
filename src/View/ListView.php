<?php
  
  //namespace ?
  require_once 'vendor/autoload.php';
  
  public function afficherListe($liste){
    //affichage html de la liste
    foreach ($list->items as $item) {
      echo("item: ".$item.nom);//placeholder,
    }
  }

?>
