<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;


class ItemView{


	function affichageItems($item){
      $app = \Slim\Slim::getInstance();

      $max = count($item);
	for ($i = 0; $i < $max; $i++) {
            //echo("<img src='$item[$i]->img'>\n");
            echo("<img src='img/download.jpg'>\n");
            echo("</br>");
		echo('<b>Nom :</b> '.$item[$i]->nom."</br>");
		echo('<b>Description</b> : '.$item[$i]->descr."</br>");
            echo('<b>Tarif :</b> '.$item[$i]->tarif."€ </br>");
            echo("<b>Reservé :</b> ");
            echo("</br>");

            $boutonAfficher = "<input type='submit' value='Afficher'>";
            $add = $app->urlFor('affItem');
            //$boutonAfficher.= $add;

            echo($boutonAfficher);
            echo("<input type='submit' value='Reserver'>");
            echo("<input type='submit' value='Supprimer'></br>");
		}
      }
      
      function affFormItem(){
            $slim = \Slim\Slim::getInstance();
            $login = '';
            echo("<h1>Formulaire d'ajout d'Item</h1>");
            echo("Veuillez remplir les champs suivants : </br>");
            //---------------------------------------------------------------------------------------------------------------------
            //nom, descr, img, liste_id, tarif
            $add = $slim->urlFor('addItem');//action du bouton (changer l'URL)
            echo ("<form action='$add' method = 'post'>
            <label for=\"listTitre\">Nom: </label>
            <input type=\"text\" name='item_nom'><br>
            <label for=\"descriptionListe\">Description: </label>
            <input type=\"text\" name='item_description'><br>
            <label for=\"descriptionListe\">Image: </label>
            <input type=\"submit\" name='item_img'><br>
            <label for=\"text\">Tarif: </label>
            <input type=\"text\" name='item_tarif'><br>
            <label for=\"dateExp\">Liste d'appartenance: </label>
            <input type=\"text\" name='liste_id'><br>
            <input type=\"submit\" value=\"Submit\">
            </form>");
      }

}
