<?php
	$pass = "1234";
	$user = "root";
	$host = "localhost";
	$db = "individuale_5bia";
	
	try {
			$dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
		} 
	catch (PDOException $e) {
    print "Error! <br/>";
    die();
}
?>