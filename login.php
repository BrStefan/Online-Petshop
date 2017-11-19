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
if( isset( $_POST['login-submit'] ) )
{

	$host = 'mysql.hostinger.ro';
	$user = 'u430933815_pet';
	$pass = 'stalingrad9';

	@mysql_connect($host, $user, $pass);

	mysql_select_db('u430933815_pet');
	$nume=$_POST['username'];
	$parola=$_POST['password'];
	$search = mysql_query("SELECT * FROM utilizatori WHERE Username='".$nume."' AND Parola='".$parola."' AND Verificat='1'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
	$row = mysql_fetch_assoc($search);
	if($match>0)
	{
		$code=$row['Activare'];
		header('Location: http://online-petshop.esy.es/panel.php?nume='.$nume.'&activation='.$code.'&pass='.$parola.'');
		return 0;
	}
	$search = mysql_query("SELECT Username Parola FROM utilizatori WHERE Username='".$nume."' AND Parola='".$parola."' AND Verificat='0'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
	if($match>0)
	{
		$message = "Cont neactivat";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return 0;
	}
	$search = mysql_query("SELECT Username Parola FROM utilizatori WHERE Username='".$nume."' AND Parola='".$parola."'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
	if($match<1)
	{
		$message = "Cont neexistent";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return 0;
	}
}
else echo '<div class="row"><div class="col-md-offset-5 col-md-6"><div class="contcreat">Acces denied!</div></div></div>';
?>
</div>
</body>
</html>