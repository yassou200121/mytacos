<?php

	if(!isset($_SESSION['id']) && !isset($_SESSION['pass']))
	{
		$_SESSION['id'] = array();
		$_SESSION['pass'] = array();
	}

	if(isset($_POST['id']) && isset($_POST['pass']))
	{
		session_start();

		if(!array_search($_POST['id'], $_SESSION['id']))
		{
			array_push($_SESSION['id'], $_POST['id']);
			array_push($_SESSION['pass'], $_POST['pass']);
		}
		else
		{
			echo 'L\'utilisateur existe déja';
		}

		print_r($_SESSION['id']);
	}
	else
	{
		echo 'Veuillez remplir tout les champs';
	}

?>