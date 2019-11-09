<?php

	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}

		$req = $bdd->prepare('SELECT * FROM users WHERE Pseudo=:ps AND Password=:pa');
		$req->execute(array('ps' => $_POST['pseudo'], 'pa' => $_POST['password']));

		if(!empty($req->fetch()['Pseudo']))
		{
			session_start();
			$_SESSION['User'] = array();
			$_SESSION['User']['ID'] = $req->fetch()['ID'];
		}
		else
		{
			echo 'Error';
		}
	}
	else
	{
		echo 'Pas assez de donnes';
	}

?>