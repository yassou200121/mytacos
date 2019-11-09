<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
	}
	catch (Exception $e)
	{
		echo 'Error : $e';
	}

	if(isset($_POST['type']))
	{
		if($_POST['type'] == 'Menu')
		{
			$req = $bdd->prepare('SELECT * FROM menus');
			$req->execute(array());

			$reqBoisson = $bdd->prepare('SELECT * FROM boisson');
			$reqBoisson->execute();

			$reqSauce = $bdd->prepare('SELECT * FROM sauce');
			$reqSauce->execute();

			while($data = $req->fetch())
			{
				echo '<li class="product" id="'. $data['ID'] .'">
								<div class="conteneur">
									<img src="'. $data['Photo'] .'" class="menuImg">
									<p class="menuName">'. $data['Name'] .'</p>
									<p class="menuPrice">'. $data['Price'] .'€</p>
								</div>
							</li>
							<aside id="default-popup'. $data['ID'] .'" menuID="'. $data['ID'] .'" class="avgrund-popup" type="'. $data['Type'] .'">
								<div class="closeImg" width="40px" height="40px"><p>X</p></div>
								<h2 class="H2MenuName">'. $data['Name'] .'</h2> 
								<div class="a371">
									<img src="'. $data['Photo'] .'" style="width: 200px; height: 100px;">
									<div class="a372">
										<p>Taille : <span style="font-weight: bold;color: black;">'. $data['Size'] .'</span></p>';

										if($data['CanChooseMeat'] == 1)
										{
											?>
											<select>
												
											</select>
											<?php
										}
										else
										{

										}

										echo '
										<p>Viandes : <span style="font-weight: bold;color: black;">'. $data['Viandes'] .'</span><img id="editMenuIMG" src="img/edit.png"></p>
										<p>Pain : <span style="font-weight: bold;color: black;">'. $data['Pain'] .'</span><img id="editMenuIMG" src="img/edit.png"></p>
										<p>Quantité : <span style="font-weight: bold;color: black;"><input id="quantite" type="number" value="1" name="quantity" min="1" max="20"></span></p>
										<p>Sauce : <span style="font-weight: bold;color: black;">
											<select id="sauceSelect">
												';
													while($sauce = $reqSauce->fetch())
													{
														echo '<option id="sauceOption">' . $sauce['Name'] . '</option>';
													}
												echo '
											</select>
										</span></p>
										<p>Boisson : <span style="font-weight: bold;color: black;">
											<select id="boissonSelect">
												';
													while($boisson = $reqBoisson->fetch())
													{
														echo '<option id="boissonOption">' . $boisson['Name'] . '</option>';
													}
												echo '
											</select>
										</span></p>
										<p>Commentaire : <input id="commentaireMenu" type="text" value=""></p>
									</div>
								</div>
								<a class="a373">AJOUTER</a>
							</aside>';
			}
		}
		else if($_POST['type'] == 'Sandwich')
		{
			$req = $bdd->prepare('SELECT * FROM sandwich WHERE Type=?');
			$req->execute(array($_POST['type']));

			while($data = $req->fetch())
			{
				echo '<li class="product" id="'. $data['ID'] .'">
								<div class="conteneur">
									<img src="'. $data['Photo'] .'" class="menuImg">
									<p class="menuName">'. $data['Name'] .'</p>
									<p class="menuPrice">'. $data['Price'] .'€</p>
								</div>
							</li>
							<aside id="default-popup'. $data['ID'] .'" class="avgrund-popup">
								<img class="closeImg" src="img/close.png" width="40px" height="40px">
								<h2 class="H2MenuName">Menu kebab au boeuf </h2> 
								<div class="a371">
									<img src="'. $data['Photo'] .'" style="max-width: 200px; max-height: 300px;">
									<div class="a372">
										<p>Nombre de viandes : <span style="font-weight: bold;color: black;">'. $data['Size'] .'</span></p>
										<p>Viandes : <span style="font-weight: bold;color: black;">'. $data['Viandes'] .'</span></p>
										<p>Pain : <span style="font-weight: bold;color: black;">'. $data['Pain'] .'</span></p>
										<p>Sauce : <span style="font-weight: bold;color: black;">'. $data['Sauce'] .'</span></p>
										<p>Quantité : <span style="font-weight: bold;color: black;"><input type="number" value="1" name="quantity" min="1" max="20"></span></p>
									</div>
								</div>
								<a class="a373">AJOUTER</a>
							</aside>';
			}
		}
		else if($_POST['type'] == 'Frittes')
		{
			$req = $bdd->prepare('SELECT * FROM sandwich WHERE Type=?');
			$req->execute(array($_POST['type']));

			while($data = $req->fetch())
			{
				echo '<li class="product" id="'. $data['ID'] .'">
								<div class="conteneur">
									<img src="'. $data['Photo'] .'" class="menuImg">
									<p class="menuName">'. $data['Name'] .'</p>
									<p class="menuPrice">'. $data['Price'] .'€</p>
								</div>
							</li>
							<aside id="default-popup'. $data['ID'] .'" class="avgrund-popup">
								<img class="closeImg" src="img/close.png" width="40px" height="40px">
								<h2 class="H2MenuName">Menu kebab au boeuf </h2> 
								<div class="a371">
									<img src="'. $data['Photo'] .'" style="width: 200px; height: 100px;">
									<div class="a372">
										<p>Sauce : <span style="font-weight: bold;color: black;">'. $data['Sauce'] .'</span></p>
										<p>Quantité : <span style="font-weight: bold;color: black;"><input type="number" value="1" name="quantity" min="1" max="20"></span></p>
									</div>
								</div>
								<a class="a373">AJOUTER</a>
							</aside>';
			}
		}
		else if($_POST['type'] == 'Composition')
		{

			echo '
				<div id="progressContainer" style="background-color: transparent; width: auto; height:auto; display:flex; padding-top: 20px;">
					<div id="progressBarCompo" style="display:block; height:25px; width: 500px; border: solid 2px blue; margin-left:auto;margin-right:auto;"></div>
				</div>
			
			<center>
				<div id="compoMenuContainer" style="display:block;width: auto; margin:0 auto; background-color:transparent; height:400px; margin-left:auto;margin-right:auto;">
					<aside style="display:inline-block;">
						<h2 class="H2MenuName">Pain</h2> 
						<div class="modalCompo">
							<p>Choisissez votre pain :</p>
							<select id="breadCompoSelect" style="margin-right: 0 auto;margin-left: 0 auto;max-height:25px;">
								<option>Sandwich</option>
								<option>Burger</option>
								<option>Galette</option>
							</select>
						</div>
						<a class="validCompoButton">Suivant</a>
					</aside>

					<aside style="display:none;">
						<h2 class="H2MenuName">Sandwich</h2> 
						<div class="modalCompo">
							<p>Choisissez la taille de votre sandwich :</p>
							<select id="sizeCompoSelect" style="margin-right: 0 auto;margin-left: 0 auto;max-height:25px;">
								<option>M</option>
								<option>L</option>
								<option>XL</option>
								<option>XXL</option>
							</select>
						</div>
						<a class="validCompoButton">Suivant</a>
					</aside>

					<aside style="display:none;">
						<h2 class="H2MenuName">Viandes</h2> 
						<div class="modalCompo">
							<p>Choisissez vos viandes</p>
							<select id="viandeCompoSelect" style="margin-right: 0 auto;margin-left: 0 auto;max-height:25px;">
								<option>Cordon bleu</option>
								<option>Kebab</option>
								<option>Chicken</option>
								<option>Steack</option>
								<option>Nuggets</option>
							</select>
						</div>
						<a class="validCompoButton">Suivant</a>
					</aside>

					<aside style="display:none;">
						<h2 class="H2MenuName">Sauces</h2> 
						<div class="modalCompo">
							<p>Choisissez-vos sauces :</p>
							<select id="sauceCompoSelect">
								<option>Curry</option>
								<option>Mayonnaise</option>
								<option>Ketchup</option>
								<option>Moutarde</option>
								<option>Algérienne</option>
								<option>Marocaine</option>
								<option>Barbecue</option>
							</select>
						</div>
						<a class="validCompoButton">Suivant</a>
					</aside>

					<aside style="display:none;">
						<h2 class="H2MenuName">Boisson</h2> 

						<div class="modalCompo">
						<p>Choisissez vos boissons</p>
							<select id="boissonCompoSelect">
								<option>Cocal Cola</option>
								<option>Coca Cola Light</option>
								<option>Coca Cola Zero</option>
								<option>Coca Cola Cherry</option>
								<option>Orangina</option>
								<option>Sprite</option>
								<option>Schweeps</option>
								<option>Oasis</option>
								<option>Ice Tea</option>
								<option>7up</option>
							</select>
						</div>
						<a class="validCompoButton">Suivant</a>
					</aside>
					<aside style="display:none;">
						<h2 class="H2MenuName">Quantité</h2> 
						<div class="modalCompo" style="font-size: 17px; line-height: 1em; color:black;display:flex;justify-content:center;">
							<a class="lessQuantityCompo">-</a>
							<input id="quantityCompo" class="numberInput" value="1">
							<a class="moreQuantityCompo">+</a>
						</div>
						<br>
						<a class="validCompoButton">Ajouter</a>
					</aside>
					<aside style="display:none;">
						<h2 class="H2MenuName">Récapitulatif</h2> 
						<div class="modalCompo" style="font-size: 17px; line-height: 1em; color:black;">
							<p id="size">Taille : <span class="bold"></span></p>
							<p id="viandes">Viandes : <span class="bold"></span></p>
							<p id="sauce">Sauce : <span class="bold"></span></p>
							<p id="boisson">Boisson : <span class="bold"></span></p>
							<p id="price" style="font-weight: bold;line-height: 0.75em;">PRIX : <span class="bold"></span></p>
						</div>
						<br>
						<a class="validCompoButton">Ajouter</a>
					</aside>
					<aside style="display:none;">
						<br>
						<a class="panierButton">Aller au panier</a>
						<a class="restartComposition">Continuer achat</a>
					</aside>
				</div></center>
';
		}
	}
	else
	{
		echo 'error';
	}
?>