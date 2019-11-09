<?php
	class User
	{
		private $id;
		private $pseudo;
		private $password;
		private $name;
		private $email;
		private $phoneNumber;
		private $photo;
		private $score;
		private $commandes;

		function __construct($idU)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=mytacos', 'root', '');
			}
			catch (Exception $e)
			{
				echo 'Error : $e';
			}

			$req = $bdd->prepare('SELECT * FROM users WHERE ID=?');
			$req->execute(array($idU));
			$d = $req->fetch();

			$this->id = $d['ID'];
			$this->pseudo = $d['Pseudo'];
			$this->password = $d['Password'];
			$this->name = $d['Name'];
			$this->email = $d['Email'];
			$this->phoneNumber = $d['PhoneNumber'];
			$this->photo = $d['Photo'];
			$this->score = $d['Score'];
			$this->commandes = $d['Commandes'];
		}

		public function getName()
		{
			return $this->name;
		}
	}

	function userExist($pseudo)
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=mytacos', 'root', '');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}


		$verifReq = $bdd->prepare('SELECT Password FROM users WHERE pseudo=:ps');
		$verifReq->execute(array('ps' => $pseudo));

		if(empty($verifReq->fetch()['Password']))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function addUser($pseudo, $pass, $name, $email, $phone, $photo)
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=mytacos', 'root', '');
		}
		catch (Exception $e)
		{
			echo 'Error : $e';
		}

		$req = $bdd->prepare('INSERT INTO users(Pseudo, Password, Name, Email, PhoneNumber, Photo) VALUES(?, ?, ?, ?, ?, ?');
		$req->execute(array($pseudo, $pass, $name, $email, $phone, $photo));
	}
?>