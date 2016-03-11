<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
    $player_id = $_SESSION["player_id"]; 
	//echo $player_id;
	
	$playerQuery = $pdo->prepare("SELECT `name`, `money` FROM `player` WHERE `ID` = ?");
	$playerQuery->execute(array($player_id));
	$playerInfo = $playerQuery->fetchAll();
	
	$stmt2 = $pdo->prepare("SELECT `water`, `cereals`, `malt`, `yeast` FROM `player` WHERE `ID` = ?");
	$stmt2->execute(array($player_id));
	$result2 = $stmt2->fetchAll();
	//print_r($result2);
	
	

	$stmt = $pdo->prepare("SELECT `korn` FROM `player` WHERE `ID` = ?");
	$stmt->execute(array($player_id));
	$result = $stmt->fetchAll();
	//print_r($result);
	

?>
	<form id="form-buy-water" name="buy-water" method="POST" target="_self" action="bought-water.php"></form>
	<form id="form-buy-cereals" name="buy-cereals" method="POST" target="_self" action="bought-cereals.php"></form>
	<form id="form-buy-malt" name="buy-malt" method="POST" target="_self" action="bought-malt.php"></form>
	<form id="form-buy-yeast" name="buy-yeast" method="POST" target="_self" action="bought-yeast.php"></form>
	<form id="form-wheat-liquor" name="make-wheat-liquor" method="POST" target="_self" action="wheat_liquor_distilled.php"></form>
	
	<div class="center">
		<?=html_table_from_array($playerInfo)?>
		
		<p id = "text" >Lass uns nun zu Anfang einfachen Korn brennen.</p><br>

		<p id = "schrift" >Du brauchst:</p>
		5 x Wasser<br>
		3 x Getreide<br>
		1 x Malz<br>
		1 x Hefe<br>
		<br></br>
		
		<p id = "schrift" >Kaufen:</p>	
		<input id = "button" id="water" form="form-buy-water" type="submit" value="Wasser (3 Geld)">
		<input id = "button" id="cereals" form="form-buy-cereals" type="submit" value="Getreide (5 Geld)">
		<input id = "button" id="malt" form="form-buy-malt" type="submit" value="Malz (10 Geld)">
		<input id = "button" id="yeast" form="form-buy-yeast" type="submit" value="Hefe (15 Geld)">
		<br></br>
		
		<p id = "schrift" >Du hast:</p> 		
		<center><?=html_table_from_array($result2)?></center>
		<center><?=html_table_from_array($result)?></center>
		<br></br>
		<br></br>
		
		<p id = "schrift" >Ich habe genug Zutaten:</p><br>
		<input id = "button" id="wheat-liquor" form="form-wheat-liquor" type="submit" value="Endlich!! lass uns Kron brennen.">
	</div>

<?php
	require_once 'include/sticky_footer.html.inc';
?>