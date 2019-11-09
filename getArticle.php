 <?php

	if(!isset($_SESSION['panier']))
	{
		exit();
	}
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
	}
	catch (Exception $e)
	{
		echo 'Error : $e';
	}
	
	for($i = 0; $i < count($_SESSION['panier']['Menu']); $i++)
	{
		$menu = new Menu(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		$menu->withMenu($_SESSION['panier']['Menu'][$i]);
		
		echo '<tr id="'. $i .'" type="menu">
				<td class="imgArticle" style="width:150px;"><a><img class="imgArticle" src="'. $menu->getPhoto() .'"></a></td>
				<td class="nameArticle" style="width: 100px !important;">
					<p class="title">'. $menu->getName() .'</p>
				</td>
				<td class="SizeArticle" style="width: 100px !important;">
					<p class="title">';

					if(is_array($menu->getViandes()))
					{
						echo implode(';', $menu->getViandes());
					}
					else
					{
						echo $menu->getViandes();
					}
					echo '</p>
				</td>
				<td class="sauceArticle" style="width: 100px !important;">
					<p class="title">'. $menu->getSauce() .'</p>
				</td>
				<td class="boissonArticle" style="width: 100px !important;">
					<p class="title">'. $menu->getBoisson() .'</p>
				</td>
				<td class="quantiteArticle">
					<input id="quantityArticleInput'. $i .'" class="numberInput" value="'. $menu->getQuantity() .'">
					<div id="editQuantityDiv">
						<a class="lessQuantity" number="'. $i .'">-</a>
						<a class="moreQuantity" number="'. $i .'">+</a>
					</div>
				</td>
				<td class="deleteArticle" style="width:auto;">
					<img class="trash" src="img/trash.png">
				</td>
				<td class="priceArticle" style="text-align: center;">
					<p class="title">'. $menu->getPrice()*$menu->getQuantity() .'€</p>
				</td>
			</tr>';
	}
	for($i = 0; $i < count($_SESSION['panier']['Composition']) - 1; $i++)
	{
		$req = $bdd->prepare('SELECT * FROM composition WHERE id=:id');
		$req->execute(array('id' => $_SESSION['panier']['Composition'][$i]));
		$compo = $req->fetch();
		
		echo '<tr id="'. $req['ID'] .'" type="compo">
				<td class="imgArticle" style="width:150px !important;"><a><img class="imgArticle" src="img/001.png"></a></td>
				<td class="nameArticle" style="width: 100px !important;">
					<p class="title">Taille : '. $compo['Size'].'</p>
				</td>
				<td class="SizeArticle" style="width: 100px !important;">
					<p class="title">'. $compo['Viandes'] .'</p>
				</td>
				<td class="sauceArticle" style="width: 100px !important;">
					<p class="title">'. $compo['Sauce'] .'</p>
				</td>
				<td class="boissonArticle" style="width: 100px !important;">
					<p class="title">'. $compo['Boisson'] .'</p>
				</td>
				<td class="quantiteArticle">
					<input id="quantityArticleInput'. $i .'" class="numberInput" value="'. $compo['Quantity'] .'">
					<div id="editQuantityDiv">
						<a class="lessQuantity" number="'. $i .'">-</a>
						<a class="moreQuantity" number="'. $i .'">+</a>
					</div>
				</td>
				<td class="deleteArticle" style="width:50px !important;">
					<img class="trash" src="img/trash.png">
				</td>
				<td class="priceArticle" style="text-align: center;">
					<p class="title">'. $compo['Price']*$compo['Quantity'] .'€</p>
				</td>
			</tr>';
	}

?>