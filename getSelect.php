<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id8603033_mytacos', 'id8603033_root', 'momosouria');
	}
	catch (Exception $e)
	{
		echo 'Error : $e';
	}

	if(isset($_POST['id']))
	{
		$req = $bdd->prepare('SELECT MeatAvailable FROM menus WHERE ID=?');
		$req->execute(array($_POST['id']));

		$viandes = explode(';', $req->fetch()['MeatAvailable']);

		echo '
		<select id="selectViande" class="meatSelect">';

		for ($i=0; $i < count($viandes); $i++)
		{
			if($i == count($viandes) - 1)
			{
				echo '<option class="viandeOption" >'. $viandes[$i] .'</option>';
			}
			else
			{
				echo '<option class="viandeOption lastSelect" style="margin-bottom: 0px !important;">'. $viandes[$i] .'</option>';
			}
		}
		echo '</select>';

	}

?>