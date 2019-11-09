<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
	}
	catch (Exception $e)
	{
		echo 'Error : $e';
	}

	if(isset($_POST['id']) && isset($_POST['size']))
	{
		$req = $bdd->prepare('SELECT Price FROM configMenu WHERE ID=? AND Size=?');
		$req->execute(array($_POST['id'], $_POST['size']));
	}

	echo $req->fetch()['Price'];

?>