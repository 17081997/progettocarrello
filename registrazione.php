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
	$nome = $_POST['testoNome'];
	$cognome = $_POST['testoCognome'];
	$username = $_POST['testoUsername'];
	$password = $_POST['testoPassword'];
	//$password = md5($password);

		$stm = $dbh->prepare("INSERT INTO utenti(nomeUtente,cognomeUtente,usernameUtente,passwordUtente) VALUES('$nome','$cognome','$username','$password')");
		$stm->execute();
		if($stm->errorCode()==0)
		{
			echo "Registrazione avvenuta con successo";
			echo "<a href='login.php'> login </a>";	
		}
		else
		{
			echo "Errore nella query";
		}
	}
}else{
?>

	<form id="formRegistrazione" method="post" action="registrazione.php">
		<center>
			<h2> Registrazione </h2>
			<br>
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
		</center>
	</form>	
	<?php
}
	?>
</body>
</html>