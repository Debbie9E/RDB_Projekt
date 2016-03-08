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
	
	

	require_once 'include/header.html.inc';
?>
	<h1>Dein erstellter Charakterter</h1>
	<div class="center">
		
		<?=html_table_from_array($character)?>

		<form id ="form-beginn-page" name="beginn-page" method="POST" target="_self" action="beginn_game.php"></form>

		<h4>Geben Sie die ID Ihres Characters an: </h4>
		
		<input form="form-beginn-page" type="text" name="player_id" maxlength="64" placeholder="id eingeben" required><br></br><br></br>
	
		<input id="button" form="form-beginn-page" type="submit" value="Charakter laden" ><br>
	
	</div>	
<?php
	require_once 'include/sticky_footer.html.inc';
?>