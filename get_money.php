<?php 

	require_once 'include/init.php.inc';
	
	SESSION_START();
    $player_id = $_SESSION["player_id"]; 
	//echo $player_id;
	$_SESSION["player_id2"] = $player_id;
	
	$playerQuery = $pdo->prepare("SELECT `name`, `money` FROM `player` WHERE `ID` = ?");
	$playerQuery->execute(array($player_id));
	$playerInfo = $playerQuery->fetchAll();
	
	
	$stmt = $pdo->prepare("SELECT money FROM player WHERE ID = ?");
	$stmt->execute(array($player_id));
	$money = $stmt->fetchColumn();

	
	
	$query = $pdo->prepare("UPDATE `player` SET `money`= `money` + 1 WHERE `ID` = ?");
	$k = $query->execute(array($player_id)); 
	
	
	$message = $money;
	require_once 'include/header.html.inc';
	
	
?>
	<?=html_table_from_array($playerInfo)?>
	<div class="center">
		<form id="form-get-money" name="get-money" method="POST" target="_self" action="get_money.php"></form>
		<form id="form-buy" name="buy" method="POST" target="_self" action="buy.php"></form>		
			<br></br>
			<h2>Ihr verdientes Geld:</h2>
			
			<?=$message?><br>
			<br></br>
			<input id = "button" form="form-get-money" type="submit" value="€ klick mich €">
			<br></br>		<br></br>
			<input id = "button" form="form-buy" type="submit" id="los" value="Ich glaub` ich hab genug verdient, lass uns einkaufen.">
			
		
	</div>



	
<?php
	
	require_once 'include/sticky_footer.html.inc';
?>