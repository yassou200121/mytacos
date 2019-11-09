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
	</head>
	<aside id="default-popup'. $data['ID'] .'" class="avgrund-popup">
		<img class="closeImg" src="img/close.png" width="40px" height="40px">
		<h2 class="H2MenuName">Supprimer le menu</h2> 
		<div class="a371">
			<div class="a372">
				<p>Nombre de viandes : <span style="font-weight: bold;color: black;">'. $data['Size'] .'</span></p>
				<p>Viandes : <span style="font-weight: bold;color: black;">'. $data['Viandes'] .'</span></p>
				<p>Pain : <span style="font-weight: bold;color: black;">'. $data['Pain'] .'</span></p>
				<p>Sauce : <span style="font-weight: bold;color: black;">'. $data['Sauce'] .'</span></p>
				<p>Quantité : <span style="font-weight: bold;color: black;"><input type="number" value="1" name="quantity" min="1" max="20"></span></p>
			</div>
		</div>
		<a class="a373">AJOUTER</a>
	</aside>
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
					<a href="menu.php">Composition</a>
					<a href="menu.php">Sandwich</a>
					<a href="menu.php">Tenders</a>
					<a href="menu.php">Salade</a>
					<a href="menu.php">Frittes</a>
					<?php
						include('class/Menu.php');
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
				<div id="listProductPanier">
					<h2>Menus ajoutés au panier :</h2>
					<div id="flexColumn">
						<table>
							<tbody>
								<?php
									include('getArticle.php');
								?>
							</tbody>
						</table>
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