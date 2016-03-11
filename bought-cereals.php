<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
	$player_id = $_SESSION["player_id2"];
	//echo $player_id;
	
	$playerQuery = $pdo->prepare("SELECT `name`, `money` FROM `player` WHERE `ID` = ?");
	$playerQuery->execute(array($player_id));
	$playerInfo = $playerQuery->fetchAll();
	
	
	$query = $pdo->prepare("UPDATE `player` SET `cereals` = `cereals` + 1, `money` = `money` - 5 WHERE `ID` = ?");
	$bought = $query->execute(array($player_id ));
	
		
	$stmt = $pdo->prepare("SELECT `money` FROM `player` WHERE `ID` = ?");
	$stmt->execute(array($player_id ));
	$money = $stmt->fetchColumn();
	
	$message2 = $money;
	
	$stmt2 = $pdo->prepare("SELECT `cereals` FROM `player` WHERE `ID` = ?");
	$stmt2->execute(array($player_id ));
	$cereals = $stmt2->fetchColumn();
	
	$message3 = $cereals;
	
	if($bought == true){
		$message = "Sie haben 1x Getreide gekauft";
	} else {
		$message = "Fehler";
	}

?>
	<?=html_table_from_array($playerInfo)?>
		<form id="form-buy" name="buy" method="POST" target="_self" action="buy.php"></form>
		<form id="form-get-money" name="money" method="POST" target="_self" action="get_money.php"></form>
		
	<div class="center">
		<br></br>
		<?=$message?>
		<br></br>
		<input id = "button" form="form-buy" type="submit" value="Mehr kaufen">
		<input id = "button" form="form-get-money" type="submit" value="Mehr Geld verdienen">
		<br></br>
		Du hast jetzt:<br> 
		<?=$message3?> Getreide
		<br></br>
		Du hast :<br> 
		<?=$message2?> Geld/Schulden
	
	</div>
<?php
	require_once 'include/sticky_footer.html.inc';
?>