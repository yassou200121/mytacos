<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
	}
	catch (Exception $e)
	{
		echo 'Error : $e';
	}

	session_start();
	$req = $bdd->prepare('SELECT * FROM users WHERE ID=?');
	$req->execute(array($_SESSION['id']));

?>