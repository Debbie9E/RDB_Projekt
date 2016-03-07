<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	//$stmt = $pdo->prepare("SELECT `water`, `cereals`, `malt`, `yeast` FROM `player` WHERE `ID` = 2");
	$stmt = $pdo->prepare("SELECT * FROM `player` WHERE `ID` = 2");
	$stmt->execute();
	//$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	//print_r($result);


?>
	<form id="form-buy-water" name="buy-water" method="POST" target="_self" action="bought-water.php"></form>
	<form id="form-buy-cereals" name="buy-cereals" method="POST" target="_self" action="bought-cereals.php"></form>
	<form id="form-buy-malt" name="buy-malt" method="POST" target="_self" action="bought-malt.php"></form>
	<form id="form-buy-yeast" name="buy-yeast" method="POST" target="_self" action="bought-yeast.php"></form>

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
		<?=html_table_from_array($result)?>
	</div>

<?php
	require_once 'include/sticky_footer.html.inc';
?>