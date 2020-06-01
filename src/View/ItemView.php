<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;
use \PHPProject\View\Outils;
use \PHPProject\models\Item;

class ItemView{

      public static function boucleAffichageItem($item){
            $app = \Slim\Slim::getInstance();
            $max = count($item);
            for ($i = 0; $i < $max; $i++) {
                  echo("</br>");

                  $path="img/".$item[$i]->img;
                  if(isset($item[$i]->img)){
                        echo ("<img src='$path' class='img-item' width=\"350\" height=\"250\">\n");
                  }else{
                        echo("<i>Image indisponible</i>");
                  }
                  echo("</br>");
                  echo ("<div class='infoItem'>");
                  echo('<b>Nom :</b> '.$item[$i]->nom."</br>");
                  echo('<b>Description</b> : '.$item[$i]->descr."</br>");
                  echo('<b>Tarif :</b> '.$item[$i]->tarif."€ </br>");
                  echo("<a href='".$item[$i]->lien."'>Lien externe</a></br>");
                  echo("<b>Reservé :</b> ".$item[$i]->reservation);
                  echo("</br>");
                  
                  echo("<div class = 'boutonItem'>");
                  echo("<div class='lien'><a href=".$app->urlFor('bookForm',array('token' => $item[$i]->id)).">Réserver l'item</a></div>");
                  echo("<div class='lien'><a href=".$app->urlFor('modForm',array('token' => $item[$i]->id)).">Modifier l'item</a></div>");
                  echo("<div class='lien'><a href=".$app->urlFor('suppItem',array('token' => $item[$i]->id)).">Supprimer  l'item</a></div>");
                  echo("</div>");
                  echo("</div>");
                  }
      }

      function affichageItems($item){
      $app = \Slim\Slim::getInstance();
            ItemView::boucleAffichageItem($item);
      }

      function affichageAllItems(){
            Outils::headerHTML("Affichage Items");
            echo("<h1>Affichage de tous les items: </h1>");
            $item = Item::select('*')->get();
            ItemView::boucleAffichageItem($item);
            Outils::footerHTML();
      }
 
      function affFormItem($id){
            Outils::headerHTML("Création d'item");
            $slim = \Slim\Slim::getInstance();
            echo("<h1>Formulaire d'ajout d'item</h1>");
            echo("Veuillez remplir les champs suivants : </br>");
            
            $add = $slim->urlFor('addItem');    //action du bouton (changer l'URL)
            echo (
            "<div class='encadrementItem'>
            <form action='$add' method = 'post'>
            <label for=\"listTitre\">Nom: </label>
            <input type=\"text\" name='item_nom'><br>
            <label for=\"descriptionListe\">Description: </label>
            <input type=\"text\" name='item_description'><br>
            <label for=\"descriptionListe\">Image: </label>
            <input type=\"text\" name='item_img'><br>
            <label for=\"text\">Tarif: </label>
            <input type=\"text\" name='item_tarif'><br>
            <label for=\"dateExp\">Liste d'appartenance: </label>
            <input type=\"text\" name='liste_id' value='$id'><br>
            <label for=\"dateExp\">Lien vers site exterieur: </label>
            <input type=\"text\" name='item_lien'><br>
            <input type=\"submit\" value=\"Submit\">
            </form>
            </div>");
            Outils::footerHTML();
      }

      // Formulaire de modification
      function affModFormItem($id){
            Outils::headerHTML("Modification d'item");
            $slim = \Slim\Slim::getInstance();
            $item = Item::where('id','=', $id)->first();
            echo("<h1>Formulaire de modification d'item</h1>");
            echo("Veuillez remplir les champs suivants : </br>");
            
            $add = $slim->urlFor('modItem',array('token' => $id));    //action du bouton (changer l'URL)
            echo (
            "<div class='encadrementItem'>
            <form action='$add' method = 'post'>
            <label for=\"listTitre\">Nom: </label>
            <input type=\"text\" name='itemMod_nom' value = '$item->nom'><br>
            <label for=\"descriptionListe\">Description: </label>
            <input type=\"text\" name='itemMod_description' value = '$item->descr'><br>
            <label for=\"descriptionListe\">Image: </label>
            <input type=\"text\" name='itemMod_img' value = '$item->img'><br>
            <label for=\"text\">Tarif: </label>
            <input type=\"text\" name='itemMod_tarif' value = '$item->tarif'><br>
            <label for=\"dateExp\">Liste d'appartenance: </label>
            <input type=\"text\" name='liste_id' value='$id'><br>
            <label for=\"dateExp\">Lien vers site exterieur: </label>
            <input type=\"text\" name='item_lien' value='$item->lien'><br>
            <input type=\"submit\" value=\"Submit\">
            </form>
            </div>");
            Outils::footerHTML();
      }

      function affBookForm($id){
            Outils::headerHTML("Réservation d'item");
            $slim = \Slim\Slim::getInstance();
            echo("<h1>Formulaire de réservation d'item </h1>");
            echo("Veuillez remplir le champ suivant : </br>");

            $add = $slim->urlFor('booking',array('book_name'=>$id));//action du bouton (changer l'URL)
            echo ("<form action='$add' method = 'post'>
            <label for=\"listTitre\">Votre prénom : </label>
            <a href=".$slim->urlFor('booking',array('token' => $id)).">Valider</a></br>
            </form>");//fin du formulaire

            Outils::footerHTML();
      }

      function ErreurBooked(){
            Outils::headerHTML("Erreur");
            echo("<h2>Oups...Il semblerait que cet item ai été réservé par quelqu'un</h2>");
            Outils::FooterHTML();
      }

}
