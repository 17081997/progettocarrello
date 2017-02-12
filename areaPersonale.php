<?php
	include 'conn.inc.php';
	session_start();
?>

<html>
	<body>
		
	<?php
		if(isset($_POST['disconnetti']))
		{
			unset($_SESSION['login']);
			echo "sessione".$_SESSION['login'];
			echo "<a href='login.php'> Logout </a>";
		}
		else
		{
	?>
		
	    <center>
	        <strong> <h2> Accesso all'area personale</h2> </h2></strong>
	    </center>
	    <br> 
	    <br>
	    <form id="formlogin" action="" method="POST"> 
		<input type="submit" name="disconnetti" value="Disconetti">
		</form>
		<?php
	    }
	    ?>
	</body>
</html>