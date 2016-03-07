<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	$query = $pdo->prepare("UPDATE `player` SET `cereals` = `cereals` + 1, `money` = `money` - 5 WHERE `ID` = 2");
	$bought = $query->execute();
	
		
	$stmt = $pdo->prepare("SELECT `money` FROM `player` WHERE `ID` = 2");
	$stmt->execute();
	$money = $stmt->fetchColumn();
	
	$message2 = $money;
	
	$stmt2 = $pdo->prepare("SELECT `cereals` FROM `player` WHERE `ID` = 2");
	$stmt2->execute();
	$cereals = $stmt2->fetchColumn();
	
	$message3 = $cereals;
	
	if($bought == true){
		$message = "Sie haben 1x Getreide gekauft";
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
		<input form="form-buy" type="submit" value="Mehr kaufen">
		<input form="form-get-money" type="submit" value="Mehr Geld verdienen">
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