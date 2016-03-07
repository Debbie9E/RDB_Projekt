<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
?>
	<h1>Erstellen Sie einen Character</h1>
	
	<div class= "center" >
			
		<form id="form-choose-name" name="choose-name" method="POST" target="_self" action="created_character.php"></form>
				
		<br></br>
			<h3>Geben Sie einen Namen ein</h3>
			<input form="form-choose-name" type="text" name="name" maxlength="64" placeholder="Name" required><br>
		<br></br>
			<h3>Wählen Sie ein Geschlecht</h3>
			<label>
				Weiblich
				<input form="form-choose-name" type="checkbox" name="gender" value="female" >
			</label>
			<label>
				Männlich
				<input form="form-choose-name" type="checkbox" name="gender" value="male" ></br>
			</label>
		<br></br>
			<h3>Geben Sie eine Haarfarbe ein</h3>
			<input form="form-choose-name" type="text" name="haircolor" maxlength="49" placeholder="Haarfarbe" required><br>
		<br></br>
			<h3>Geben Sie ein Geburtsdatum ein</h3>
			<input form="form-choose-name" type="date" name="birthdate" placeholder="Geburtstag" required><br>
			
		<br></br>
		<br></br>
		<input id="button" form="form-choose-name" type="submit" value="Character erstellen"</br>
	</div>
	
<?php
	require_once 'include/sticky_footer.html.inc';
?>