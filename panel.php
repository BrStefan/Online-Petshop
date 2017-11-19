<?php
// Start the session
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://online-petshop.esy.es/stylepanel.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Petshop-Cont</title>
</head>
<script>
$(document).ready(function(){
    $("#1").click(function(){
		document.getElementById("id1").style.display = "inline";
        document.getElementById("id2").style.display = "none";
		document.getElementById("id3").style.display = "none";
		document.getElementById("id4").style.display = "none";
    });
    $("#2").click(function(){
		document.getElementById("id1").style.display = "none";
        document.getElementById("id2").style.display = "inline";
		document.getElementById("id3").style.display = "none";
		document.getElementById("id4").style.display = "none";
    });
	$("#3").click(function(){
		document.getElementById("id1").style.display = "none";
        document.getElementById("id2").style.display = "none";
		document.getElementById("id3").style.display = "inline";
		document.getElementById("id4").style.display = "none";
    });
	$("#4").click(function(){
		document.getElementById("id1").style.display = "none";
        document.getElementById("id2").style.display = "none";
		document.getElementById("id3").style.display = "none";
		document.getElementById("id4").style.display = "inline";
    });
});


</script>
<body>
<?php
//http://stackoverflow.com/questions/19089384/twitter-bootstrap-3-two-columns-full-height
$nume=$_GET['nume'];
$parola=$_GET['pass'];
$act=$_GET['activation'];
if(strlen($act)!=0)
{
	$host = 'mysql.hostinger.ro';
	$user = 'u430933815_pet';
	$pass = 'stalingrad9';

	@mysql_connect($host, $user, $pass);

	mysql_select_db('u430933815_pet');
	$search = mysql_query("SELECT * FROM utilizatori WHERE Username='".$nume."' AND Parola='".$parola."' AND Verificat='1'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
	$row = mysql_fetch_assoc($search);
	$email=$row['Email'];
	$telefon=$row['Telefon'];
	$produse=$row['Produse_cumparate'];
	
	$q1= mysql_query("SELECT * FROM caini");
	$i=0;
	while($row = mysql_fetch_assoc($q1))
	{
		$i++;
		$c[$i]=$row["URL"];
		$c1[$i]=$row["Nume produs"];
		$c2[$i]=$row["Cantitate"];
		$c3[$i]=$row["Pret"];
	}
	$q2= mysql_query("SELECT * FROM pisici");
		$i=0;
	while($row = mysql_fetch_assoc($q2))
	{
		$i++;
		$p[$i]=$row["URL"];
		$p1[$i]=$row["Nume produs"];
		$p2[$i]=$row["Cantitate"];
		$p3[$i]=$row["Pret"];
	}
	$q3= mysql_query("SELECT * FROM rozatoare");
		$i=0;
	while($row = mysql_fetch_assoc($q3))
	{
		$i++;
		$r[$i]=$row["URL"];
		$r1[$i]=$row["Nume produs"];
		$r2[$i]=$row["Cantitate"];
		$r3[$i]=$row["Pret"];
	}
	$_SESSION["cont"]=$nume;
	$_SESSION["telefon"]=$telefon;
	$_SESSION["email"]=$email;
	$_SESSION["activare"]=$act;
	$_SESSION["parola"]=$parola;
	
	echo'<div class="caseta">
			<img src="http://imgur.com/Y3KowGu.png" height="50" width="60">
			<div class="info">Salut '.$nume.'</div>
		</div>';
		echo '  <div class="row col-wrap">  
					<div class="col-md-2 col"> 
					<div class="btn-group-vertical  stanga"> 
						<button type="button" class="btn" id="1">Prima pagina</button>
						<button type="button" class="btn" id="2">Comanda un produs</button>
						
					</div>  
					</div> 
					<div class="col-md-10 col informatii" > 
					<div id="id1"  style="display:inline"> 
					<center><font size=5>Date Generale despre cont</font><br>
					<font size=3>Nume: '.$nume.'<br>
					Telefon: '.$telefon.'<br>
					Email: '.$email.'<br>
					Produse cumparate: '.$produse.'<br>
					Istoric comenzi:<a href=http://online-petshop.esy.es/istoric.php?nume='.$nume.'&activation='.$act.'&pass='.$parola.' target="_blank"> Aici</a></center></font>
					</div> 
					<form id="cumpara-form" action="cumpara.php" method="post" role="form" style="display: block;" onsubmit="return verifica();">
					<div id="id2"  style="display:none" >  
					'
					;$ct = count($c);
					for($i=1;$i<=$ct;$i++)
					{
						echo'<img class="left" src='.$c[$i].' width="200" height="200">';
						echo'<div id="cumpara" class="pull-left">
						Nume: '.$c1[$i].'<br>
						Pret: '.$c3[$i].' lei
						<br>Introduceti cantitatea pe care doriti sa o achizitionati:<input type="text" name="c'.$i.'">
						</div>';
						echo'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
					}
					;$ct = count($p);
					for($i=1;$i<=$ct;$i++)
					{
						echo'<img class="left" src='.$p[$i].' width="200" height="200">';
						echo'<div id="cumpara" class="pull-left">
						Nume: '.$p1[$i].'<br>
						Pret: '.$p3[$i].' lei
						<br>Introduceti cantitatea pe care doriti sa o achizitionati:<input type="text" name="p'.$i.'">
						</div>';
						echo'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
					}
					;$ct = count($r);
					for($i=1;$i<=$ct;$i++)
					{
						echo'<img class="left" src='.$r[$i].' width="200" height="200">';
						echo'<div id="cumpara" class="pull-left">
						Nume: '.$r1[$i].'<br>
						Pret: '.$r3[$i].' lei
						<br>Introduceti cantitatea pe care doriti sa o achizitionati:<input type="text" name="r'.$i.'">
						</div>';
						echo'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
					}
					echo '<center><button type="submit" class="button button5" value="Submit">Cumpara</button></center>';
					echo '</form>';
					'
					</div>
					<div id="id3" style="display:none" >text 3</div>
					<div id="id4" style="display:none" >text 4</div>
				</div> 
			</div>
				  ';
			   
}
else echo "No";
?>
</body>
</html>