<?php

	class Menu
	{
		private $id;
		private $quantite;
		private $sauce;
		private $boisson;
		private $canChooseMeat;
		private $viandes;
		private $photo;
		private $size;
		private $name;
		private $price;
		private $commentaire;

		function __construct($idProd, $quantiteProd, $sauceProd, $boissonProd, $viandeProd, $photoProd, $nameProd, $priceProd, $com, $sizeProd)
		{
			$this->id = $idProd;
			$this->quantite = $quantiteProd;
			$this->sauce = $sauceProd;
			$this->boisson =  $boissonProd;
			$this->viandes = $viandeProd;
			$this->photo = $photoProd;
			$this->name = $nameProd;
			$this->price = $priceProd;
			$this->commentaire = $com;
			$this->size = $sizeProd;
		}

		public function withMenu($menu)
		{
			$this->id = $menu->getId();
			$this->quantite = $menu->getQuantity();
			$this->sauce = $menu->getSauce();
			$this->boisson =  $menu->getBoisson();
			$this->viandes =  $menu->getViandes();
			$this->photo = $menu->getPhoto();
			$this->name = $menu->getName();
			$this->price = $menu->getPrice();
			$this->commentaire = $menu->getCommentaire();
		}

		public function withId($i)
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=mytacos', 'root', '');
			}
			catch (Exception $e)
			{
				echo 'Error : $e';
			}

			$req = $bdd->prepare('SELECT * FROM menus WHERE id=?');
			$req->execute(array($i));
			while($data = $req->fetch())
			{
				$this->id = $data['ID'];
				$this->quantite = 1;
				$this->sauce = NULL;
				$this->boisson =  NULL;
				$this->canChooseMeat = $data['CanChooseMeat'];
				$this->viandes = $data['MeatAvailable'];
				$this->photo = $data['Photo'];
				$this->name = $data['Name'];
				$this->price = $data['Price'];
				$this->commentaire = NULL;
			}
		}

		public function is_equal($menu)
		{
			if($menu->getId() == $this->id && $menu->getQuantity() == $this->quantite && $menu->getSauce() == $this->sauce && $menu->getBoisson() == $this->boisson)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function addQuantity($qty)
		{
			$this->quantite += $qty;
		}

		public function removeQuantity($qty)
		{
			$this->quantite -= $qty;
		}

		public function getId()
		{
			return $this->id;
		}
		public function getQuantity()
		{
			return $this->quantite;
		}
		public function getSauce()
		{
			return $this->sauce;
		}
		public function getBoisson()
		{
			return $this->boisson;
		}
		public function getName()
		{
			return $this->name;
		}
		public function getViandes()
		{
			return $this->viandes;
		}
		public function getSize()
		{
			return count(explode($this->viandes, ';'));
		}
		public function getPhoto()
		{
			return $this->photo;
		}
		public function getPrice()
		{
			return $this->price;
		}
		public function getCommentaire()
		{
			return $this->commentaire;
		}

		public function setCanChooseMeat($bool)
		{
			$this->canChooseMeat = $bool;
		}
	}

?>