<?php

namespace PHPProject\View;
use \PHPProject\controller\UserController as UserController;


class ItemView{


	function affichageItem($item){
      $app = \Slim\Slim::getInstance();
      $content = "";


      $content .= "\n<!-- Item -->\n";
      if (isset($item->img)) $content .= "<img src='./img/item/$item->img' class='img-item' alt='Image : $item->nom'>\n";
      $content .= "<h1> $item->nom </h1>\n";
      $content .= "<p class='description-item'> $item->descr </p>\n";
      $content .= "<p> Tarif : $item->tarif € </p>\n";
      if (isset($item->url)) $content .= "<p> Plus d'infos : <a href='$item->url' target=_blank> $item->url </a></p>\n";

      $content .= "\n<!-- Actions -->\n";
 	$this->addContent($content);
	}


}
