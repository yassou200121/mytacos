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
		if($_POST['type'] == "Menu")
		{
			$req = $bdd->prepare('SELECT * FROM menus');
			$req->execute(array());

			$reqSauce = $bdd->prepare('SELECT * FROM sauce');
			$reqSauce->execute(array());

			$reqBoisson = $bdd->prepare('SELECT * FROM boisson');
			$reqBoisson->execute(array());

			$reqSauceArray = array();
			$reqBoissonArray = array();

			while($boisson = $reqBoisson->fetch())
			{
				array_push($reqBoissonArray, $boisson['Name']);
			}

			while($sauce = $reqSauce->fetch())
			{
				array_push($reqSauceArray, $sauce['Name']);
			}

			while($data = $req->fetch())
			{
				echo '
					<li class="product" id="'. $data['ID'] .'">
						<div class="conteneur">
							<img src="'. $data['Photo'] .'" class="menuImg">
							<p class="menuName">'. $data['Name'] .'</p>
							<p class="menuPrice">'. $data['Price'] .'€</p>
						</div>
					</li>
					<aside id="default-popup'. $data['ID'] .'" menuID="'. $data['ID'] .'" class="avgrund-popup">
						<div class="closeImg" width="40px" height="40px"><p>X</p></div>
							<h2 class="H2MenuName">'. $data['Name'] .'</h2> 
							<div class="a371">
								<img src="'. $data['Photo'] .'" style="width: 200px; height: 100px;">
								<div class="a372">
									<p>Taille : <select class="selectSize">';

									$size = explode(';', $data['Size']);

									for ($i=0; $i < count($size); $i++)
									{ 
										echo '<option>'. $size[$i] .'</option>';
									}

									echo '</select>
										<!--<img id="editMenuIMG" src="img/edit.png">--></p>';

									if($data['CanChooseMeat'] == 1)
									{
										?>
										<p style="display:flex;flex-direction:column;" class="meatP">Viandes :
										<select id="selectViande" class="meatSelect">
										<?php

											$viandes = explode(';', $data['MeatAvailable']);

											for ($i=0; $i < count($viandes); $i++)
											{ 
												echo '<option class="viandeOption">'. $viandes[$i] .'</option>';
											}

										?>
										</select>
										<!--<img id="editMenuIMG" src="img/edit.png">--></p>
										<?php
									}
									else
									{

									}

									echo '
									<p>Sauce : <span style="font-weight: bold;color: black;">
										<select class="sauceSelect">';
										for ($i=0; $i < count($reqSauceArray); $i++)
										{ 
											echo '<option id="sauceOption">' . $reqSauceArray[$i] . '</option>';
										}
										echo '
										</select>
									</span></p>
									<p>Boisson : <span style="font-weight: bold;color: black;">
									<select class="boissonSelect">';

									for ($i=0; $i < count($reqBoissonArray); $i++)
									{ 
										echo '<option id="boissonOption">' . $reqBoissonArray[$i] . '</option>';
									}
									
									echo '
									</select>
									</span></p>
									<p>Quantité : <span style="font-weight: bold;color: black;"><input id="quantite" type="number" value="1" name="quantity" min="1" max="20"></span></p>
									<p>Commentaire : <input class="commentaireMenu" type="text" value=""></p>
									<p class="price">Prix : <span style="color:black;font-size:20px;font-weight:bold;">'. $data['Price'] .'€</p>
								</div>
							</div>
							<a class="a373">AJOUTER</a>
						</aside>';
				}
		}
		else if($_POST['type'] == 'Tenders' || $_POST['type'] == 'Sandwich' || $_POST['type'] == 'Frittes')
		{
			$req = $bdd->prepare('SELECT * FROM sandwich WHERE Type=?');
			$req->execute(array($_POST['type']));

			while($data = $req->fetch())
			{
				echo '
					<li class="product" id="'. $data['ID'] .'">
						<div class="conteneur">
							<img src="'. $data['Photo'] .'" class="menuImg">
							<p class="menuName">'. $data['Name'] .'</p>
							<p class="menuPrice">'. $data['Price'] .'€</p>
						</div>
					</li>
					<aside id="default-popup'. $data['ID'] .'" menuID="'. $data['ID'] .'" class="avgrund-popup">
						<div class="closeImg" width="40px" height="40px"><p>X</p></div>
							<h2 class="H2MenuName">'. $data['Name'] .'</h2> 
							<div class="a371">
								<img src="'. $data['Photo'] .'" style="width: 200px; height: 100px;">
								<div class="a372">
									<p>' . $data['Description'] . '</p>
								</div>
							</div>
							<a class="a373">AJOUTER</a>
						</aside>';
			}
		}
	}
	else if($_POST['type'] == "Boissons")
	{
		$reqBoisson = $bdd->prepare('SELECT * FROM boisson');
		$reqBoisson->execute(array());

		while($data = $reqBoisson->fetch())
		{
			echo '
					<li class="product" id="'. $data['ID'] .'">
						<div class="conteneur">
							<img src="'. $data['Photo'] .'" class="menuImg">
							<p class="menuName">'. $data['Name'] .'</p>
							<p class="menuPrice">'. $data['Price'] .'€</p>
						</div>
					</li>
					<aside id="default-popup'. $data['ID'] .'" menuID="'. $data['ID'] .'" class="avgrund-popup">
						<div class="closeImg" width="40px" height="40px"><p>X</p></div>
							<h2 class="H2MenuName">'. $data['Name'] .'</h2> 
							<div class="a371">
								<img src="'. $data['Photo'] .'" style="width: 200px; height: 100px;">
								<div class="a372">
									<p>' . $data['Description'] . '</p>
								</div>
							</div>
							<a class="a373">AJOUTER</a>
						</aside>';
		}
	}
?>