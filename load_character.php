<?php
	require_once 'include/init.php.inc';

	require_once 'include/header.html.inc';
?>
	<h1> Character laden </h1>
	<div class = "center">
	
		<h3>Laden Sie einen bereits erstellten Charakter</h3>
			<form id="form-load-character" name="load-character" method="POST" target="_self" action="character_found.php"></form>
			
			<input form="form-load-character" type="text" name="load" maxlength="64" placeholder="character name"><br> 
			<br></br>
			<br></br>
			<input id="button" form="form-load-character" type="submit" value="Charakter laden"><br>
	
	</div>
<?php
	require_once 'include/sticky_footer.html.inc';
?>