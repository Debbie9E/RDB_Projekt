<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	SESSION_START();
	$player_id = $_POST['player_id'];
	$_SESSION["player_id"] = $player_id;
	//echo $player_id;

	
?>
	<form id = "form-earn-money" name="earn_money" method="POST" target="_self" action="get_money.php"></form>
	<div class = "center">
		<!-- hier erklärung zum spiel --> 
		Hallo und herzlich willkommen zu <br>
		Schnapsfarmeramer!
		<br></br>
		Wir wollen heute Schnaps brennen!<br>
		
		Dazu muessen wir erstmal ein wenig Geld verdienen, <br>
		um die benoetigten Zutaten kaufen zu koennen.<br>
		<br></br>
		(wir gehen zunaechst erstmal davon aus, dass wir <br>
		alle Werkzeuge, welche benoetigen wuerden, breits bestizen.)<br>
		
		<br></br>
		Also, weiter gehts mit dem geld verdienen.<br>
       <br></br>
	   <input type="submit" form="form-earn-money" value="Los zum Geld verdienen">

	<d/iv>
<?php
	require_once 'include/sticky_footer.html.inc';
?>