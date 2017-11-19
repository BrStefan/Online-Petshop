<html>
<head>
<title>Petshop- cont creat</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://online-petshop.esy.es/style.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<center><img src="http://imgur.com/Y3KowGu.png" height="400" width="300"></center><br><br><br><br>
<?php

$host = 'mysql.hostinger.ro';
$user = 'u430933815_pet';
$pass = 'stalingrad9';

@mysql_connect($host, $user, $pass);

mysql_select_db('u430933815_pet');
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['activation']) && !empty($_GET['activation']))
{
	$email = mysql_escape_string($_GET['email']); // Set email variable
    $activation = mysql_escape_string($_GET['activation']); // Set hash variable
	$search = mysql_query("SELECT Email, Activare, Verificat FROM utilizatori WHERE email='".$email."' AND Activare='".$activation."' AND Verificat='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
	 if($match > 0)
	 {
		 mysql_query("UPDATE utilizatori SET Verificat='1' WHERE Email='".$email."' AND Activare='".$activation."' AND Verificat='0'") or die(mysql_error());
		 echo '<div class="row"><div class="col-md-offset-6 col-md-6"><div class="contcreat">Contul dumneavoastra a fost activat!<br>Acum puteti sa va logati <a href="http://online-petshop.esy.es/cont.php">aici</a></div></div></div>';
	 }
	 else echo '<div class="row"><div class="col-md-offset-4 col-md-6"><div class="contcreat1">Contul dumneavoastra a fost deja activat!<br>Acum puteti sa va logati <a href="http://online-petshop.esy.es/cont.php">aici</a></div></div></div>';
}
else echo '<div class="row"><div class="col-md-offset-5 col-md-6"><div class="contcreat">Acces denied!</div></div></div>';
?>
</div>
</body>
</html>