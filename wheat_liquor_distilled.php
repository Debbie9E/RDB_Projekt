<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
	$player_id = $_SESSION["player_id2"];
	//echo $player_id;
	
	$query = $pdo->prepare("SELECT `water` FROM `player` WHERE `ID` = ?");
	$query->execute(array($player_id ));
	$water1 = $query->fetchColumn();
	$water = $water1;
	echo $water;
	
	$query2 = $pdo->prepare("SELECT `cereals` FROM `player` WHERE `ID` = ?");
	$query2->execute(array($player_id ));
	$cereals1 = $query2->fetchColumn();
	$cereals = $cereals1;
	echo $cereals;
	
	$query3 = $pdo->prepare("SELECT `malt` FROM `player` WHERE `ID` = ?");
	$query3->execute(array($player_id ));
	$malt1 = $query3->fetchColumn();
	$malt = $malt1;
	echo $malt;
	
	$query4 = $pdo->prepare("SELECT `yeast` FROM `player` WHERE `ID` = ?");
	$query4->execute(array($player_id ));
	$yeast1 = $query4->fetchColumn();
	$yeast = $yeast1;
	echo $yeast;
	
	/*	
		if((($water >= 5)&&($cereals >= 4)&&($malt >= 1)&&($yeast >= 1)) == true){
			$query5 = $pdo->prepare("UPDATE `player` SET `korn` = `korn` + 1, 
														 `water` = `water` - 5,
														 `cereals` = `cereals` - 3,
														 `malt` = `malt` - 1,
														 `yeast` = `yeast` - 1 WHERE `ID` = ?");
			$query5->execute(array($player_id));
			$message1 = "Glückwunsch, du hast eine Flasche Korn gebrannt!";
					}
				}
			}	
		}
		}else {
			$message1 = "Du hast leider nicht genug Zutaten."
		}
	*/	

?>
		<form id="form-get-money" name="get-money" method="POST" target="_self" action="get_money.php"></form>
	<form id="form-buy" name="buy" method="POST" target="_self" action="buy.php"></form>		
	
	<div class = "center">
		<br></br>
		<?$message1?><br>
		<br></br>
		
		<br></br>
			<input form="form-get-money" type="submit" value="Geld verdienen ">
			<br></br>		<br></br>
			<input form="form-buy" type="submit" id="los" value="Einkaufen">
	</div>
	
<?php
	require_once 'include/sticky_footer.html.inc';
?>