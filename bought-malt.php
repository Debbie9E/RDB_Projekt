<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	$query = $pdo->prepare("UPDATE `player` SET `malt` = `malt` + 1, `money` = `money` - 10 WHERE `ID` = 2");
	$bought = $query->execute();
	
		
	$stmt = $pdo->prepare("SELECT `money` FROM `player` WHERE `ID` = 2");
	$stmt->execute();
	$money = $stmt->fetchColumn();
	
	
	$message2 = $money;
	
	$stmt2 = $pdo->prepare("SELECT `malt` FROM `player` WHERE `ID` = 2");
	$stmt2->execute();
	$malt = $stmt2->fetchColumn();
	
	$message3 = $malt;
	
	if($bought == true){
		$message = "Sie haben 1x Malz gekauft";
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
		<?=$message3?> Malz
		<br></br>
		Du hast:<br> 
		<?=$message2?> Geld/Schulden
	
	</div>
<?php
	require_once 'include/sticky_footer.html.inc';
?>