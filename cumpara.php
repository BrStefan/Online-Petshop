<?php
// Start the session
session_start();
?>
<html>
<head>
<title>
Proces cumparare
</title>
  <link rel="stylesheet" type="text/css" media="all" href="stylepanel.css">
  <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Skranji:400,700|Oxygen:400,700">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
</head>
<body>
<?php
	$host = 'mysql.hostinger.ro';
	$user = 'u430933815_pet';
	$pass = 'stalingrad9';

	@mysql_connect($host, $user, $pass);

	mysql_select_db('u430933815_pet');
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
	echo"<center><img src=http://imgur.com/Y3KowGu.png height=200 width=200>
	<div id=w>
    <h1>Formular comanda</h1>
    
    <form id=cumpara1-form action=punecumpara.php method=post role=form style=display: block; onsubmit=return verifica();>
      <p class=note><span class=req></span>Toate casutele sunt obligatorii</p>
      <div class=row>
        <label for=name>Nume intreg: <span class=req></span></label>
        <input type=text name=name id=name class=txt tabindex=1 placeholder=Nume required>
      </div>
      
      <div class=row>
        <label for=email>Adresa completa: <span class=req></span></label>
        <input type=text name=adresa id=adresa class=txt tabindex=2 placeholder=Adresa required>
      </div>
	  
	  <font size=2><br>Termenii si conditi:<br><br><br>
	  <br>Accesul in vederea efectuarii unei Comenzii ii este permis oricarui Client/Cumparator.
Pentru motive justificate Online Petshop isi rezerva dreptul de a restrictiona accesul Clientului/Cumparatorului in vederea efectuarii unei Comenzi si/sau la unele din modalitatile de plata acceptate, in cazul in care considera ca in baza conduitei sau a activitatii Clientului/Cumparatorului pe Site, actiunile acestuia ar putea prejudicia in vreun fel Online Petshop. In oricare dintre aceste cazuri, Clientul/Cumparatorul se poate adresa Departamentului de Relatii cu Clientii al Online Petshop, pentru a fi informat cu privire la motivele care au condus la aplicarea masurilor susmentionate.</font>
	
	
      <div class=center>
        <input type=submit id=submitbtn name=submitbtn tabindex=5 value=Cumpara>
      </div>
  </div>
</center>";
	echo "<div id=w>";
	echo "<h1>Produse comandate</h1><center><font size=3>";
	$text='';
	$total=0;
	$total_local=0;
	$produse=0;
	for($i=1;$i<=100;$i++)
	{
		$numar="c".$i;
		if(isset($_POST["$numar"]) && $_POST["$numar"]>0)
		{
		$produs=$_POST["c$i"];
		$produse+=$produs;
		$total_local+=$c3[$i]*$produs;
		$text=sprintf("%s %s - %s bucati - %d lei;<br><br>",$text,$c1[$i],$produs,$total_local);
		$total_local=0;
		$total+=$c3[$i]*$produs;
		}
	}
	for($i=1;$i<=100;$i++)
	{
		$numar="p".$i;
		if(isset($_POST["$numar"]) && $_POST["$numar"]>0)
		{
		$produs=$_POST["p$i"];
		$produse+=$produs;
		$total_local+=$p3[$i]*$produs;
		$text=sprintf("%s %s - %s bucati - %d lei;<br><br>",$text,$p1[$i],$produs,$total_local);
		$total_local=0;
		$total+=$p3[$i]*$produs;
		}
	}
	for($i=1;$i<=100;$i++)
	{
		$numar="r".$i;
		if(isset($_POST["$numar"]) && $_POST["$numar"]>0)
		{
		$produs=$_POST["r$i"];
		$produse+=$produs;
		$total_local+=$r3[$i]*$produs;
		$text=sprintf("%s %s - %s bucati - %d lei;<br><br>",$text,$r1[$i],$produs,$total_local);
		$total_local=0;
		$total+=$r3[$i]*$produs;
		}
	}
	$_SESSION["text"]=$text;
	$_SESSION["plata"]=$total;
	$_SESSION["produse"]=$produse;
	$text=sprintf("%s <br> Total de plata: %d lei",$text,$total);
	echo $text;
	echo "</form>";
?>
</body>
</html>