<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://online-petshop.esy.es/stylepanel.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Petshop-Cont</title>
</head>
<body>
<?php
//http://stackoverflow.com/questions/19089384/twitter-bootstrap-3-two-columns-full-height
$nume=$_GET['nume'];
$parola=$_GET['pass'];
$act=$_GET['activation'];
$host = 'mysql.hostinger.ro';
	$user = 'u430933815_pet';
	$pass = 'stalingrad9';

	@mysql_connect($host, $user, $pass);

	mysql_select_db('u430933815_pet');
	$search=mysql_query("SELECT * FROM comenzi WHERE NumeCont='$nume'");
	$rows=mysql_num_rows($search);
	if($rows>0)
	{
		echo "<font size=2>";
		echo "<table border='2'>
		<tr>
		<th>Nume</th>
		<th>Adresa</th>
		<th>Comanda</th>
		<th>Total</th>
		</tr>";

		while($row = mysql_fetch_array($search))
		{
		echo "<tr>";
		echo "<td>" . $row['Nume'] . "</td>";
		echo "<td>" . $row['Adresa'] . "</td>";
		echo "<td>" . $row['Comanda'] . "</td>";
		echo "<td>" . $row['Total'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
	}
	
?>
</body>
</html>