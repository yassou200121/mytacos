<?php

	if(isset($_POST['id']) && isset($_POST['size']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}

		$req = $bdd->prepare('SELECT MeatNumber FROM configMenu WHERE ID=? AND Size=?');
		$req->execute(array($_POST['id'], $_POST['size']));

		echo $req->fetch()['MeatNumber'];
	}

?>