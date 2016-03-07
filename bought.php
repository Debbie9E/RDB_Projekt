<?php
	require_once 'include/init.php.inc';
	require_once 'include/header.html.inc';
	
	switch($_GET['id']) {
		case 'water':
			$query = $pdo->prepare("UPDATE `character` SET `water` = `water` + 1 WHERE `ID` = 2");
			$query->execute();
			break;
		case 'cereal':
			$query = $pdo->prepare("UPDATE `character` SET `cereals` = `cereals` + 1 WHERE `ID` = 2");
			$query->execute();
			break;
		case 'malt':
			$query = $pdo->prepare("UPDATE `character` SET `malt` = `malt` + 1 WHERE `ID` = 2");
			$query->execute();
			break;
		case 'yeast':
			$query = $pdo->prepare("UPDATE `character` SET `yeast` = `yeast` + 1 WHERE `ID` = 2");
			$query->execute();
			break;
				
	}
	
	
?>


<?php
	require_once 'include/sticky_footer.html.inc';
?>