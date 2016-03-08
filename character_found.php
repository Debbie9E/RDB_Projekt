<?php
	require_once 'include/init.php.inc';
	
	$query = $pdo->prepare("SELECT * FROM `player` WHERE `name` LIKE ?");
	
	$entered_name = '%'.$_POST['load'].'%';
	
	$query->execute(array($entered_name));
	$character_found = $query->fetchAll();
	
	require_once 'include/header.html.inc';
?>
	<form id = "form-beginn-page" name="beginn-page" method="POST" target="_self" action="beginn_game.php"></form>
	
	<h1>Gefundene Character</h1>
		
	<div class = "center">
		
		<h3>Folgende Character wurden gefunden</h3>
		<?=html_table_from_array($character_found)?>
		
		
		<h4>Geben Sie die ID Ihres Characters an: </h4>
		<input form="form-beginn-page" type="text" name="player_id" maxlength="64" placeholder="id eingeben" required><br></br><br></br>
	
		<input id="button" form="form-beginn-page" type="submit" value="Charakter laden" ><br>
	</div>

<?php
	require_once 'include/sticky_footer.html.inc';
?>