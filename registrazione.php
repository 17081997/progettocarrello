<?php
include 'conn.inc.php';
?>

<html>
<body>
<?php
if(isset($_POST['invio']))
{
	if(!isset($_POST['testoPassword']) || ($_POST['testoPassword']) == "" || ($_POST['testoPassword']) !=($_POST['testoConfermaPassword']))
	{
		echo "Attenzione! Reinserire campi!<br>";
		echo "<a href='registrazione.php'> registrazione </a>";
		
	}
	else
	{
	$nome = $_POST['nomeUtente'];
	$cognome = $_POST['cognomeUtente'];
	$username = $_POST['usernameUtente'];
	$password = $_POST['passwordUtente'];
	//$password = md5($password);

		$st = "INSERT INTO utenti(Nome,Cognome,Username,Password) VALUES('$nome','$cognome','$username','$password')"; 
		$stm = $dbh->prepare($st);
		$stm->execute();
		
		echo "Registrazione avvenuta con successo";
		echo "<a href='login.php'> login </a>";
	}
}else{
?>

	<form id="formRegistrazione" method="post" action="registrazione.php">
	<h2> Registrazione </h2>
	Nome </br>
	<input type = "text" name="testoNome" /></br></br>
	Cognome </br>
	<input type = "text" name="testoCognome" /></br></br>
	Username </br>
	<input type = "text" name="testoUsername" /></br></br>
	Password </br>
	<input type = "password" name="testoPassword" /></br></br>
	Conferma </br>
	<input type = "password" name="testoConfermaPassword" /></br></br>
	<input type = "submit" name = "invio" value = "Registrati"/>	
	</form>	
	<?php
}
	?>
</body>
</html>