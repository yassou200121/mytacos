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
					<a class="headerLink">Menu</a>
					<a class="headerLink">Composition</a>
					<a class="headerLink">Sandwich</a>
					<a class="headerLink">Tenders</a>
					<a class="headerLink">Salade</a>
					<a class="headerLink">Frittes</a>
					<?php
						session_start();
						if(isset($_SESSION['User']))
						{
							echo '<a id="connexionButton" href="profil.php">Profil</a>';
						}
						else
						{
							echo '<script>document.location.href = "index.php";</script>';
						}
					?>
				</div>
			</header>

			<div id="mainImg">

			</div>

			<div class="horizontalLine" style="margin-top: 50px;"></div>

			<div id="main">
				<div id="profilContainer">
					<div id="headProfil">
						<img id="profilPhoto">
						<p id="profilName">YASSINE</p>
					</div>
					<div class="horizontalLine"></div>
					<div id="bodyProfil">
						<p id="scoreP">Score : 40000 commandes</p>
						<div id="preferMenu">
							<h2 style="font-size: 30px; margin-left:5%; margin-top:1%;">Menu préféré</h2>
							<div style="display:flex;margin-left:15%;font-size:28px;width:70%;justify-content:space-between;margin-right:10px; color: rgb(77,77,77);">
								<p>Taille</p>
								<p>Viandes</p>
								<p>Sauce</p>
								<p>Boisson</p>
							</div>
							<div style="display:flex;margin-left:15%;font-size:20px;width:70%;justify-content:space-between;margin-right:10px;">
								<p style="display:block; width:17.5%;">M</p>
								<p style="display:block; width:17.5%;">Kebab</p>
								<p style="display:block; width:17.5%;">Algérienne marocaine</p>
								<p style="display:block; width:17.5%;">Sprite</p>
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
		<script src="js/menu.js" type="text/javascript"></script>
		<script src="js/pannier.js" type="text/javascript"></script>
		<script src="js/animatedModal.min.js"></script>
	</body>
</html>