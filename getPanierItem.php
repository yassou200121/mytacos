<?php
	include('class/Menu.php');
	session_start();

	if(isset($_SESSION['panier']))
	{
		if(empty($_SESSION['panier']['Menu']))
		{
			echo '<div class="listProduct">
					<p style="display: block;">Aucun produit</p>
					<div class="panierPrice">
						<div class="cart-prices-line first-line">
							<span >Aucun produit</span>
						</div>
						<div>
							<span>Total 0,00 €</span>
						</div>
					</div>
				</div>
				<a id="panierButton">
					<span>Aller au panier</span>
				</a>';
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

			$reqMenu = $bdd->prepare('SELECT Photo FROM menu WHERE ID=?');
			$totalPrice = 0;
			$nbProduct = 0;

			if(!empty($_SESSION['panier']['Menu']))
			{
				$nbProduct += count($_SESSION['panier']['Menu']);
			}

			for($i = 0; $i < count($_SESSION['panier']['Menu']); $i++)
			{
				$totalPrice += $_SESSION['panier']['Menu'][$i]->getPrice() * $_SESSION['panier']['Menu'][$i]->getQuantity();
			}

			echo '<div class="listProduct">
				<p style="display: block;">'. $nbProduct .' produits</p>

				<div class="panierPrice">
					<div style="display:flex; flex-direction:column;">';
						
			echo '</div>
					<div class="cart-prices-line last-line">
						<span>Total '. $totalPrice .'€</span>
					</div>
				</div>
			</div>
			<a id="panierButton">
				<span>Aller au panier</span>
			</a>';
		}
	}
	else
	{
		print_r('pas de sessions');
	}
?>