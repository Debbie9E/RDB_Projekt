<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
	$player_id = $_SESSION["player_id2"];
	//echo $player_id;
	
	$playerQuery = $pdo->prepare("SELECT `name`, `money` FROM `player` WHERE `ID` = ?");
	$playerQuery->execute(array($player_id));
	$playerInfo = $playerQuery->fetchAll();
	
	
	$query = $pdo->prepare("SELECT `water` FROM `player` WHERE `ID` = ?");
	$query->execute(array($player_id ));
	$water = $query->fetchColumn();
	
	
	$query2 = $pdo->prepare("SELECT `cereals` FROM `player` WHERE `ID` = ?");
	$query2->execute(array($player_id ));
	$cereals = $query2->fetchColumn();
	
	
	$query3 = $pdo->prepare("SELECT `malt` FROM `player` WHERE `ID` = ?");
	$query3->execute(array($player_id ));
	$malt = $query3->fetchColumn();
	
	
	
	$query4 = $pdo->prepare("SELECT `yeast` FROM `player` WHERE `ID` = ?");
	$query4->execute(array($player_id ));
	$yeast = $query4->fetchColumn();


	
		
		if((($water +0) >= 5)&&(($cereals+0) >= 3)&&(($malt+0) >= 1)&&(($yeast+0) >= 1)){
			$query5 = $pdo->prepare("UPDATE `player` SET `korn` = `korn` + 1, 
														 `water` = `water` - 5,
														 `cereals` = `cereals` - 3,
														 `malt` = `malt` - 1,
														 `yeast` = `yeast` - 1 WHERE `ID` = ?");
			$query5->execute(array($player_id));
			$message1 = "Gueckwunsch, du hast eine Flasche Korn gebrannt!";
					
			
		}else {
			$message1 = "Es tut mir leid, aber du hast leider nicht genug Zutaten.";
		}
		

?>
	<?=html_table_from_array($playerInfo)?>
		<form id="form-get-money" name="get-money" method="POST" target="_self" action="get_money.php"></form>
	<form id="form-buy" name="buy" method="POST" target="_self" action="buy.php"></form>		
	
	<div class = "center">
		<br></br>
		<?=$message1?><br>
		<br></br>
		
		<br></br>
			<input id = "button" form="form-get-money" type="submit" value="Geld verdienen ">
			
			<input id = "button" form="form-buy" type="submit" id="los" value="Einkaufen">
	</div>
	
<?php
	require_once 'include/sticky_footer.html.inc';
?>