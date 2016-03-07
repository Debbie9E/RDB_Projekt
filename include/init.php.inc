<?php
	require_once 'config.php.inc';
	require_once 'functions.php.inc';

	//connect to DB
	try {
	   $pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
	   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
	   print "Database Error: ".$e->getMessage();
	}
	


	
	//Useful for debugging!
	if($DEBUG == True) {
		//report all errors
		ini_set('error_reporting', E_ALL);
		ini_set('html_errors', 1);
		ini_set('display_errors', 1);
		//Throw an exception if a query fails
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}


?>
