<?php
	require_once 'include/header.html.inc';
?>
	<h1>Charakter</h1>
	<form id="form-load-character" name="load-character" method="POST" target="_self" action="load_character.php"></form>
	<form id="form-select-gender" name="select-gender" method="POST" target="_self" action="create_character.php"></form>
	
	
	
	<div class="center">
	<br></br>
	
	<input style="border: grey 5px solid;
						
						 font-size:28pt;" form="form-load-character" type="submit" value="laden">	
						 
	<input style="border: grey 5px solid;
						 font-size:28pt;" form="form-select-gender" type="submit" value="erstellen"></br>	
	</div>

<?php
	require_once 'include/sticky_footer.html.inc';
?>