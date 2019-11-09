<?php

require 'class/Menu.php';

function creationPanier()
{
   if(!isset($_SESSION['panier']['Menu']) || !isset($_SESSION['panier']['Menu']))
   {
      //session_start();
      $_SESSION['panier'] = array();
      $_SESSION['panier']['Menu'] = array();
      $_SESSION['panier']['Composition'] = array();
   }
  	return true;
}

function addMenu($menu)
{
      array_push($_SESSION['panier']['Menu'], $menu);
}

function addComposition($compo)
{
      array_push($_SESSION['panier']['Composition'], $compo);

      return true;
}

function removeMenu($menu)
{
   if(creationPanier())
   {
      for ($i=0; $i < count($_SESSION['panier']['Menu']); $i++)
      { 
         if($_SESSION['panier']['Menu'][$i]->getId() == $id)
         {
            $_SESSION['panier']['Menu'][$i]->removeQuantity($menu->getQuantite());
         }
      }
   }
}

?>