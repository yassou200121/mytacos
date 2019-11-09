<?php

	if(!isset($_SESSION['panier']))
	{
		
	}
	else
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}

		for($i = 0; $i < count($_SESSION['panier']['Menu']); $i++)
		{
			$menu = new Menu(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
			$menu->withMenu($_SESSION['panier']['Menu'][$i]);



		}

	}
	
?>