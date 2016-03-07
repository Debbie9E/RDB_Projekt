<?php 

	require_once 'include/init.php.inc';
	
	$stmt = $pdo->prepare("SELECT money FROM player WHERE ID = 2");
	$stmt->execute();
	$money = $stmt->fetchColumn();

	
	function count_money($money){
		$newMoney = $money + 1; 
		return ($money);
	}
	
	$newMoney = count_money($money);
	
	$query = $pdo->prepare("UPDATE `player` SET `money`= `money` + 1 WHERE `ID` = 2");
	$k = $query->execute(array($newMoney)); 
	
	
	$message = $newMoney;
	require_once 'include/header.html.inc';
	
	
?>

	<div class="center">
		<form id="form-get-money" name="get-money" method="POST" target="_self" action="get_money.php"></form>
		<form id="form-planting" name="planting" method="POST" target="_self" action="buy.php"></form>		
			<br></br>
			<h2>Ihr verdientes Geld:</h2>
			
			<?=$message?><br>
			<br></br>
			<input form="form-get-money" type="submit" value="klick mich">
			<br></br>		<br></br>
			<input form="form-planting" type="submit" id="los" value="Ich glaub hab genug verdient, weiter">
			
		
	</div>



	
<?php
	
	require_once 'include/sticky_footer.html.inc';
?>