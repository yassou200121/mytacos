<?php

	require('class/class.upload.php');
	require('class/User.php');

	if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['photoName']) && isset($_POST['photoSize']) && isset($_POST['photoType']) && isset($_FILES['photo']) && isset($_POST['adresse']))
	{

		if(userExist($_POST['pseudo']))
		{
			exit('Cet utilisateur existe déjà !');
		}

		define('TARGET', 'profil/' . $_POST['pseudo'] . '/');    // Repertoire cible
		define('MAX_SIZE', 100000);    // Taille max en octets du fichier
		define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
		define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels

		if(!is_dir(TARGET))
	  	{
	  		if(mkdir(TARGET, 0777))
	  			echo 'Création du dossier réussie !';

	  		$upload = new upload($_FILES['photo']);
		  	$newName = md5(uniqid(rand(), true));
		  	$upload->file_new_name_body = $newName;

		  	$upload->process(TARGET);
		  	if($upload->processed)
		  	{
		  		try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
				}
				catch (Exception $e)
				{
					echo 'Error : $e';
				}

				$req = $bdd->prepare('INSERT INTO users(Pseudo, Password, Name, Email, PhoneNumber, Photo, Address, Score, Commandes) VALUES(?, ?, ?, ?, ?, ?, ?, " ", " ")');
				$req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['phoneNumber'], TARGET . $newName, $_POST['adresse']));
		  	}
		  	else
		  	{
		  		echo 'Error : ' . $upload->error;
		  	}
	  	}
	}
	else
	{
		echo 'pas assez de données pour l\'inscription !';
		print_r($_FILES);
	}

?>