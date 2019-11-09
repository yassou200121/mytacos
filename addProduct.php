<?php

	include('pannier.php');	
	session_start();
	creationPanier();

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}

		if(isset($_POST['id']) && isset($_POST['quantite']) && isset($_POST['sauce']) && isset($_POST['boisson']) && isset($_POST['commentaire']) && isset($_POST['size']) && isset($_POST['p']) && isset($_POST['viandes']))
		{
			$req = $bdd->prepare('SELECT * FROM menus WHERE ID=:id');
			$req->execute(array('id' => $_POST['id']));

			while ($d = $req->fetch())
			{
				$menu = new Menu($_POST['id'], $_POST['quantite'], $_POST['sauce'], $_POST['boisson'], $_POST['viandes'], $d['Photo'], $d['Name'], $_POST['p'], $_POST['commentaire'], $_POST['size']);
				$menu->setCanChooseMeat($d['CanChooseMeat']);
				addMenu($menu);
				print_r($_SESSION['panier']['Menu']);
			}
		}
		else
		{
			echo 'pas assez de données pourtant y a le post type';
			print_r($_POST);
		}

?>