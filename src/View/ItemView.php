<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;
use \PHPProject\View\Outils;


class ItemView{

	function affichageItems($item){
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
            echo("<b>Reservé par :</b> ".$item[$i]->reservation);
            echo("</br>");
            $book=$app->urlFor("bookForm", [$item[$i]->id]);
            echo("<form action='$book' method='post'>");
            echo("<input type='submit' value='Reserver'>");
            echo("</form>");
            echo("<input type='submit' value='Supprimer'>");
            echo("</div>");
		}
      }

      
      function affFormItem(){
            Outils::headerHTML("Création d'item");
            $slim = \Slim\Slim::getInstance();
            $login = '';
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
            <input type=\"text\" name='liste_id'><br>
            <input type=\"submit\" value=\"Submit\">
            </form>
            </div>");
            Outils::footerHTML();
      }



      function affBookForm(){
            Outils::headerHTML("Réservation d'item");
            $slim = \Slim\Slim::getInstance();
            echo("<h1>Formulaire de réservation d'item </h1>");
            echo("Veuillez remplir le champ suivant : </br>");
            $add = $slim->urlFor('booking');//action du bouton (changer l'URL)
            echo ("<form action='$add' method = 'post'>
            <label for=\"listTitre\">Votre prénom : </label>
            <input required type='text'  name='book_name'></br>
            <input type='submit' value='Réserver'>\n
            </form>");//fin du formulaire
            Outils::footerHTML();
      }

}
