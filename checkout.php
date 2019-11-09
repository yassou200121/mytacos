<?php

	require_once 'class/Menu.php';
	require_once 'class/User.php';
	session_start();

	if(isset($_SESSION['User']))
	{
		$user = new USER($_SESSION['User']['ID']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/styleMenu.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/avgrund.css">
		<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/test.css">
	</head>
	<body>
		<div id="page">
			<header>
				<div id="header">
					<a href="index.php" id="aIndexImg"><img src="img/logo.png"></a>
					<h1>TITRE</h1>
					<a id="panierLink" style="float: right;" href="checkout.php"><img src="img/panier.png"></a>
					<!--<div id="panierMenu">
						<div class="listProduct"></div>
					</div>-->
				</div>
				<div id="headerLinkDiv">
					<a href="menu.php">Menu</a>
					<a href="menu.php">Sandwich</a>
					<a href="menu.php">Tenders</a>
					<a href="menu.php">Salade</a>
					<a href="menu.php">Frittes</a>
					<?php
						if(isset($_SESSION['User']))
						{
							echo '<a id="connexionButton" href="profil.php">Profil</a>';
						}
						else
						{
							echo '<a id="connexionButton" href="connexion.php">Connexion</a>';
						}
					?>
				</div>
			</header>

			<div id="mainImg">

			</div>

			<div class="horizontalLine" style="margin-top: 50px;"></div>

			<div id="main">
				<div class="DIV_1">
	<h1 class="H1_2">
		Paiement
	</h1>
	<div class="DIV_3">
		<div class="DIV_4">
			<?php

			if(!isset($_SESSION['User']))
			{
				?>
				<div class="DIV_5">
					<h2 class="H2_6">
						1. Connectez-vous ou créez un compte
					</h2>
					<div class="DIV_7">
						<div class="DIV_8">
							<div class="DIV_9">
								Vous n\'avez pas de compte MyTacos ? Inscrivez-vous en quelques click ! Si vous avez déjà un compte, connectez-vous.
							</div>
							<div class="DIV_10">
								<div class="DIV_11">
									<a href="connexion.php">
										<button type="button" class="BUTTON_12" style="display:inline-block; text-decoration: none;">
											Connexion
										</button>
									</a>
								</div>
								<a href="inscription.php">
									<button type="button" class="BUTTON_13" style="display:inline-block; text-decoration: none;">
										Créez un compte
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php }
				else
				{ ?>
				<div class="DIV_5">
					<h2 class="H2_6">
						1. Connexion
					</h2>
					<div class="DIV_7">
						<div class="DIV_8">
							<div class="DIV_9">
								Vous êtes connectés <span style="font-weight:bold;"><?php echo $user->getName(); ?></span>
							</div>
							<div class="DIV_10">
								<div class="DIV_11">
									<button type="button" class="BUTTON_12">
										Suivant
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="DIV_14">
				<h2 class="H2_15">
					2. Heure de livraison
				</h2>
				<div class="livraisonDIV_1" style="display:none;">
					<div class="livraisonDIV_2">
						<div class="livraisonDIV_3">
							<div class="livraisonDIV_6">
								<input type="checkbox" id="now">
								<span class="livraisonSPAN_7"><label for="now">Dès que la commande est prête</label></span>
								
							</div>
						</div>
						<button type="button" class="BUTTON_12">
								Suivant
							</button>
					</div>
				</div>
			</div>
			<div class="DIV_16">
				<h2 class="H2_17">
					3. Adresse
				</h2>
				<div class="DIV_7" id="adresseDivModal" style="display: none;">
					<div class="DIV_8">
						<div class="DIV_9">
							<input style="width: 200px;" id="adresseInput" type="text" placeholder="Adresse...">
						</div>
						<div class="DIV_10">
							<div class="DIV_11">
								<button type="button" class="BUTTON_12">
									Suivant
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="DIV_18">
				<h2 class="H2_19">
					4. Paiement
				</h2>
				<div class="DIV_7" id="paiementDivModal" style="display: none;">
					<div class="DIV_8">
						<div class="DIV_9">
							<label for="atHomeButton">Payer sur place</label>
							<input type="checkbox" id="atHomeButton">
							<div id="divPaypalForm">
								<label for="paypalButton">Payer en ligne</label>
								<input type="checkbox" id="paypalCheckBox'">
								<form id="formPaypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none;">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="yassou200121@gmail.com">
									<input type="hidden" name="lc" value="FR">
									<input type="hidden" name="button_subtype" value="services">
									<input type="hidden" name="no_note" value="0">
									<input type="hidden" name="currency_code" value="EUR">
									<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHostedGuest">
									<input id="paypalButton" type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
									<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
								</form>
							</div>
							
						</div>
						<div class="DIV_10">
							<div class="DIV_11">
								<button type="button" class="BUTTON_12">
									Commander
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="DIV_20">
			</div>
		</div>
		<div class="DIV_21">
			<div class="DIV_22">
				<div class="DIV_23">
					<h1>Votre commande :</h1>
				</div>
				<div class="DIV_30">

					<?php

					$totalPrice = 0;
					if(isset($_SESSION['panier']['Menu']))
					{

						for($i = 0; $i < count($_SESSION['panier']['Menu']); $i++)
						{
							$totalPrice += $_SESSION['panier']['Menu'][$i]->getPrice() * $_SESSION['panier']['Menu'][$i]->getQuantity();

							$menu = new Menu(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
							$menu->withMenu($_SESSION['panier']['Menu'][$i]);
					?>


					<div class="DIV_31" menusessionid="<?php echo $i; ?>" type="menu">
						<div class="DIV_32">
							<div class="DIV_33" style="display: flex;flex-direction:column;">
								<input id="quantityArticleInput<?php echo $i;?>" class="little-numberInput" value="<?php echo $menu->getQuantity(); ?>">
								<div class="little-editQuantityDiv">
									<a class="lessQuantity little-lessQuantity" number="<?php echo $i;?>">-</a>
									<a class="moreQuantity little-moreQuantity" number="<?php echo $i;?>">+</a>
								</div>
							</div>
							<div class="DIV_56">
								<div class="DIV_57">
									<?php echo $menu->getName();?>
								</div>
								<div class="DIV_58">
									<div class="DIV_59">
										<div class="DIV_60">
											<?php echo $menu->getBoisson();?>
										</div>
										<div class="DIV_61">
										</div>
									</div>
									<div class="DIV_62">
										<?php
											if(is_array($menu->getViandes()))
											{
												echo implode(';', $menu->getViandes()) . '	-	' . $menu->getSauce();
											}
											else
											{
												echo $menu->getViandes() . '	-	' . $menu->getSauce();
											}

										?>
										<div class="DIV_64">
										</div>
									</div>
								</div>
								<button type="button" class="BUTTON_65">
									Supprimer
								</button>
							</div>
							<div class="DIV_66" def="<?php echo $menu->getPrice(); ?>">
								<?php echo $menu->getPrice() * $menu->getQuantity() . '€';?>
							</div>
						</div>
					</div>
					<?php } }
					else
						{?>

							<div class="DIV_31" type="menu">
						<div class="DIV_32">
							<div class="DIV_56">
								<div class="DIV_57">
									Votre panier est vide
								</div>
								<div class="DIV_58">
									<div class="DIV_59">
										<div class="DIV_60">
											
										</div>
										<div class="DIV_61">
										</div>
									</div>
									<div class="DIV_62">
										<div class="DIV_64">
										</div>
									</div>
								</div>
								<button type="button" class="BUTTON_65">
									
								</button>
							</div>
							<div class="DIV_66">
							</div>
						</div>
					</div>
				<?php } ?>
					
				</div>
				<div class="DIV_109">
					<input type="text" placeholder="Ajouter un commentaire (plus de sauce, pas d'oignons… )" size="55" class="INPUT_110" />
				</div>
				<div class="DIV_111">
					<div class="DIV_118">
						Total
						<div class="DIV_119">
							<span class="SPAN_120"><?php echo $totalPrice . '€'; ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			</div>
		</div>
		<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/avgrund.js" type="text/javascript"></script>
		<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
		<script src="js/pannier.js" type="text/javascript"></script>
		<script src="js/animatedModal.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
		<script src="js/menu.js" type="text/javascript"></script>
	</body>
</html>