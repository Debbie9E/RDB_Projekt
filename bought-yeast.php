<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
	$player_id = $_SESSION["player_id2"];
	//echo $player_id;

	$query = $pdo->prepare("UPDATE `player` SET `yeast` = `yeast` + 1, `money` = `money` - 15 WHERE `ID` = ?");
	$bought = $query->execute(array($player_id ));
	
		
	$stmt = $pdo->prepare("SELECT `money` FROM `player` WHERE `ID` = ?");
	$stmt->execute(array($player_id ));
	$money = $stmt->fetchColumn();
	
	
	$message2 = $money;
	
	$stmt2 = $pdo->prepare("SELECT `yeast` FROM `player` WHERE `ID` = ?");
	$stmt2->execute(array($player_id ));
	$yeast = $stmt2->fetchColumn();
	
	$message3 = $yeast;
	
	if($bought == true){
		$message = "Sie haben 1x Hefe gekauft";
	} else {
		$message = "Fehler";
	}

?>
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
		<?=$message3?> Hefe
		<br></br>
		Du hast:<br> 
		<?=$message2?> Geld/Schulden
	
	</div>
<?php
	require_once 'include/sticky_footer.html.inc';
?>