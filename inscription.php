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
		<link rel="stylesheet" href="css/nice-select.css">
	</head>

	<body>
		<div id="page">
			<header>
				<div id="header">
					<a href="index.php" id="aIndexImg"><img src="img/logo.png"></a>
					<h1>TITRE</h1>
					<a id="panierLink" style="float: right;" href="checkout.php"><img src="img/panier.png"></a>
					<div id="panierMenu">
						<div class="listProduct"></div>
					</div>
				</div>
				<div id="headerLinkDiv">
					<a>Menu</a>
					<a>Composition</a>
					<a>Sandwich</a>
					<a>Tenders</a>
					<a>Salade</a>
					<a>Frittes</a>
					<?php
						session_start();
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
				<div id="divMenu">
					<ul class="menu">
						<li id="menu-item">
							<a id="menuLink" type="Composition">Composition</a>
						</li>
						<li id="menu-item">
							<a id="menuLink" type="Menu">Menu</a>
						</li>
						<li id="menu-item">
							<a id="menuLink" type="Sandwich">Tacos</a>
						</li>
						<li id="menu-item">
							<a id="menuLink" type="Tenders">Tenders</a>
						</li>
						<li id="menu-item">
							<a id="menuLink" type="Frittes">Frittes</a>
						</li>
						<li id="menu-item">
							<a id="menuLink" type="Boissons">Boissons</a>
						</li>
					</ul>
				</div>
				<div id="menusContainer">
					<div id="progressContainer" style="background-color: transparent; width: auto; height:auto; display:flex; padding-top: 20px;margin-right:200px;">
						<div id="progressBarInscription" style="display:block; height:25px; width: 500px; border: solid 2px blue; margin-left:auto;margin-right:auto;">

						</div>
					</div>
					<center>
						<div id="compoMenuContainer" style="display:block;width: auto; margin:0 auto; background-color:transparent; max-height:400px; margin-left:auto;margin-right:200px;">
							<aside style="display:inline-block;">
								<h2 class="H2MenuName">Pseudo</h2> 
								<div class="modalCompo">
									<p>Entrez votre Pseudo</p>
									<input id="pseudoInput" autofocus>
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Mot de passe</h2> 
								<div class="modalCompo">
									<p>Entrez votre mot de passe</p>
									<input id="passwordInput">
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Nom</h2> 
								<div class="modalCompo">
									<p>Entrez votre nom</p>
									<input id="nameInput">
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Email</h2> 
								<div class="modalCompo">
									<p>Entrez votre adresse email</p>
									<input id="emailInput" type="email">
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Numero de téléphone</h2> 
								<div class="modalCompo">
									<p>Entrez votre numéro de téléphone</p>
									<input type="tel" id="phoneNumberInput">
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Photo</h2> 
								<div class="modalCompo">
									<p>Choisissez une photo de profil</p>
									<input id="photoInput" type="file">
								</div>
								<a class="validInscriptionButton">Suivant</a>
							</aside>
							<aside style="display:none;">
								<h2 class="H2MenuName">Adresse</h2> 
								<div class="modalCompo">
									<p>Entrez votre adresse</p>
									<input id="adresseInput" type="text">
								</div>
								<a class="validInscriptionButton">S'inscrire</a>
							</aside>
						</div>
					</center>
				</div>
			</div>
		</div>

		<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/avgrund.js" type="text/javascript"></script>
		<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
		<script src="js/menu.js" type="text/javascript"></script>
		<script src="js/animatedModal.min.js"></script>
	</body>
</html>