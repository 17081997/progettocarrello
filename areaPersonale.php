<?php
	include 'conn.inc.php';
	session_start();
?>

<html>
	<head>
		<title> Prodotti </title>
		<style>
			table {
			    font-family: arial, sans-serif;
			    border-collapse: collapse;
			    width: 50%;
			}
			
			td, th {
			    border: 1px solid #dddddd;
			    text-align: left;
			    padding: 8px;
			}
			
			tr:nth-child(even) {
			    background-color: #dddddd;
			}
		</style>
	</head>
	<body>
		
	<?php
		if(isset($_POST['disconnetti']))
		{
			unset($_SESSION['login']);
			echo "<a href='login.php'> Logout </a>";
		}
		else
		{
	?>
		
	    <center>
	        <strong> <h2> Accesso all'area Personale</h2></strong>
	    </center>
	    <br> 
	    <br>
	    <form id="formlogin" action="" method="GET"> 
			<input type="submit" name="disconnetti" value="Disconetti">
		<center>
			<select name="Categorie" onchange="submit()">
					<?php
						$mysqli = new mysqli("localhost","root","","quintab_utenti");
						$query = $mysqli->query("SELECT * FROM categorie");
						while($row=$query->fetch_row()) {                                                 
							if ($_GET['Categorie']==$row[0])
								echo "<option id='".$row[0]."' value='".$row[0]."' selected='selected'>".$row[1]."</option>";
							else
								echo "<option id='".$row[0]."' value='".$row[0]."'>".$row[1]."</option>"; //
						}
					?>
				</select>
				<br>
				<br>
			<table>
				<tr>
					<th>Prodotto</th>
					<th>Prezzo</th>
				</tr>
				    <?php
				    	$mysqli = new mysqli("localhost","root","","quintab_utenti");
				    	if(isset($_GET['Categorie'])){
				    		$query = $mysqli->query("SELECT * FROM Prodotti WHERE idCategoria=". $_GET['Categorie']);
							while($row=$query->fetch_row()) {                                                 
								echo "<tr><td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td></tr>";
							}
				    	}
				    	else
						{
							$query = $mysqli->query("SELECT * FROM Prodotti");
							while($row=$query->fetch_row()) {                                                 
								echo "<tr><td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td></tr>";
							}
						}
				    ?>
			</table>
		</center>
		</form>
		<?php
	    }
	    ?>
	</body>
</html>