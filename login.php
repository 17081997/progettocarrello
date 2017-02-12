<?php
	include 'conn.inc.php';
	session_start();
?>
<html>
<body>
<?php

if(isset($_POST['invio']))
{
	if(($_POST['testoUser']) == "" || ($_POST['testoPassword']) == "")
	{
		echo "Attenzione! Campi vuoti!<br>";
		echo "<a href='login.php'> Torna al login </a>";
		
	}
	
	$username = $_POST['testoUser'];
	$password = $_POST['testoPassword'];
	
	$stmt = $dbh->prepare("SELECT count(u.idUtente) as conta FROM utenti u where u.usernameUtente = '$username' and u.passwordUtente ='$password'");
	$stmt->execute();
	$row = $stmt->fetch();
	if($row['conta'] == 1){
		//echo "Login effettuato con successo";
		session_start();
		$_SESSION['login'] = 1;
		header('Location:areaPersonale.php');
	}
	else{
		echo "Attenzione! Username o Password errati, tornare al login o registrarsi !<br>";
		echo "<a href='login.php'> Torna al login <br><br></a>";
		echo "<a href='registrazione.php'> Registrati </a>";
	}
}

else{
?>
	<form id="formLogin" method="post" action="login.php">
	<strong> <h2> Inserire i dati d'accesso per completare il Login </h2></strong> 
	<br>
	<br>
	<h2> LOGIN </h2>
	Username </br>
	<input type = "text" name="testoUser" /></br></br>
	Password </br>
	<input type = "password" name="testoPassword" /></br></br>
	<input type = "submit" name="invio" value="Accedi">
	<?php
}
	?>
</body>
</html>