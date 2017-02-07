<?php
	$pass = "";
	$user = "root";
	$host = "localhost";
	$db = "quintab_utenti";
	
	try {
			$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
		} 
	catch (PDOException $e) {
    print "Error! <br/>";
    die();
}
?>