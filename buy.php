<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
    $player_id = $_SESSION["player_id"]; 
	//echo $player_id;
	
	//$stmt = $pdo->prepare("SELECT `water`, `cereals`, `malt`, `yeast` FROM `player` WHERE `ID` = 2");
	$stmt = $pdo->prepare("SELECT * FROM `player` WHERE `ID` = ?");
	$stmt->execute(array($player_id));
	//$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	//print_r($result);


?>
	<form id="form-buy-water" name="buy-water" method="POST" target="_self" action="bought-water.php"></form>
	<form id="form-buy-cereals" name="buy-cereals" method="POST" target="_self" action="bought-cereals.php"></form>
	<form id="form-buy-malt" name="buy-malt" method="POST" target="_self" action="bought-malt.php"></form>
	<form id="form-buy-yeast" name="buy-yeast" method="POST" target="_self" action="bought-yeast.php"></form>
	<form id="form-wheat-liquor" name="make-wheat-liquor" method="POST" target="_self" action="wheat_liquor_distilled.php"></form>
	
	<div class="center">
		<br></br>
		Lass uns nun zu Anfang einfachen Schnaps brennen.<br>
		<br></br>
		Du brauchst:<br>
		<br></br>
		5 x Wasser<br>
		3 x Getreide<br>
		1 x Malz<br>
		1 x Hefe<br>
		<br></br>
		Kaufen:
		<br></br>	
		<input id="water" form="form-buy-water" type="submit" value="Wasser (3 Geld)">
		<input id="cereals" form="form-buy-cereals" type="submit" value="Getreide (5 Geld)">
		<input id="malt" form="form-buy-malt" type="submit" value="Malz (10 Geld)">
		<input id="yeast" form="form-buy-yeast" type="submit" value="Hefe (15 Geld)">
		<br></br>
		Du hast: <br>
		<?=html_table_from_array($result)?><br>
		
		<br></br>
		<br></br>
		Ich habe genug Zutaten:
		<input id="wheat-liquor" form="form-wheat-liquor" type="submit" value="Endlich.. lass uns Kron brennen.">
	</div>

<?php
	require_once 'include/sticky_footer.html.inc';
?>