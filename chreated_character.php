<?php
	require_once 'include/init.php.inc';
	
	$query = $pdo->prepare("INSERT INTO `player`(`name`, `haircolor`, `gender`, `birthdate`) VALUES(:name, :haircolor, :gender, :birthdate)");

	$data = Array(
		':name' => $_POST['name'],
		':haircolor' => $_POST['haircolor'],
		':gender' => $_POST['gender'],
		':birthdate' => $_POST['birthdate']
	);

	//$query->execute($data);
	$query->execute($data);
	
	$lastID = $pdo->lastInsertId();
	
	$character = $pdo->query("SELECT * FROM `player` WHERE `ID` = $lastID")->fetchAll();
	//$character = $pdo->query("SELECT * FROM `character` WHERE `ID` = 1")->fetchAll();
	

	require_once 'include/header.html.inc';
?>
	<div class="center">
		<?=html_table_from_array($character)?>
		
		<form id ="form-beginn-page" name="beginn-page" method="POST" target="_self" action="beginn_game.php"></form>
		<input form="form-beginn-page" type="submit" value="Weiter" ><br>
	
	</div>	
<?php
	require_once 'include/sticky_footer.html.inc';
?>