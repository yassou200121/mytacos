<?php

	require 'class/Menu.php';
	session_start();

	if(isset($_POST['id']) && isset($_POST['type']) && isset($_POST['mode']))
	{
		$mode = $_POST['mode'];
		$type = $_POST['type'];
		$id = $_POST['id'];

		if($mode == "delete")
		{
			if($type == "menu")
			{
				unset($_SESSION['panier']['Menu'][$id]);

				print_r($_SESSION['panier']['Menu']);
			}
		}
	}
	else
	{
		echo "Pas assez de données";
		print_r($_POST);
	}
?>