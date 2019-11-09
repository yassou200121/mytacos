<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/styleMenu.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/avgrund.css">
		<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/jquery-confirm.min.css">

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
					<a class="headerLink">Sandwich</a>
					<a class="headerLink">Tenders</a>
					<a class="headerLink">Salade</a>
					<a class="headerLink">Frittes</a>
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
				<div id="divMenu">
					<ul class="menu">
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
					<ul class="products">
						
					</ul>
				</div>
			</div>
		</div>

		<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/avgrund.js" type="text/javascript"></script>
		<script src="js/jquery.nicescroll.min.js" type="text/javascript"></script>
		<script src="js/animatedModal.min.js"></script>
		<script src="js/jquery-confirm.min.js"></script>
		<script src="js/menu.js" type="text/javascript"></script>
		<script type="text/javascript">
			
		</script>
	</body>
</html>