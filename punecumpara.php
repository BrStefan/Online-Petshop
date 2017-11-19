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
</head>
</head>
<body>
<?php

$nume=$_POST["name"];
$adresa=$_POST["adresa"];

$comanda=$_SESSION["text"];
$pret=$_SESSION["plata"];
$produse=$_SESSION["produse"];
$cont=$_SESSION["cont"];
$telefon=$_SESSION["telefon"];
$email=$_SESSION["email"];
$act=$_SESSION["activare"];
$parola=$_SESSION["parola"];


	$host = 'mysql.hostinger.ro';
	$user = 'u430933815_pet';
	$pass = 'stalingrad9';

	@mysql_connect($host, $user, $pass);

	mysql_select_db('u430933815_pet');
	$sql = "SELECT * FROM `utilizatori`  WHERE `Username` = '$cont'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$prod=$row["Produse_cumparate"];
	$prod+=$produse;
	mysql_query("UPDATE `utilizatori` SET `Produse_cumparate` = '$prod' WHERE `Username`= '$cont'");
	
	$comanda=str_replace("<br>","",$comanda);
	
mysql_query("INSERT INTO comenzi (Nume, Adresa, Comanda, Total, NumeCont, Telefon, Email) VALUES ('$nume', '$adresa', '$comanda','$pret','$cont','$telefon','$email')");
echo "<font size=3><center>Comanda dumneavoastra a fost plasata cu succes!<br><a href=http://online-petshop.esy.es/panel.php?nume=$cont&pass=$parola&activation=$act>Reveniti in cont</a></font></center>";


/*require 'i/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'petshopactivation@gmail.com';          // SMTP username
$mail->Password = 'stalingrad9'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('petshopactivation@gmail.com', 'Plasare comanda');
$mail->addAddress($email);   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = 'Domnule '.$nume.', <br>
Comanda dumneavoastra a fost primita, iar bunurile achizitionate vor fi livrate in cel mai scurt timp. Aveti mai jos detalii despre comanda efectuata:<br><br>
 
------------------------<br>
Adresa: '.$adresa.'<br>
Comanda: '.$comanda.'<br>
Total de plata: '.$pret.' RON<br>
------------------------<br><br>
 
Multumim pentru achizitie!';

$mail->Subject = 'Comanda PetShop';
$mail->Body    = $bodyContent;

$mail->send();*/

$to      = $email; // Send email to our user
$subject = 'Plasare comanda'; // Give the email a subject 
$message = '
 
Domnule '.$nume.',
Comanda dumneavoastra a fost primita, iar bunurile achizitionate vor fi livrate in cel mai scurt timp. Aveti mai jos detalii despre comanda efectuata:
 
------------------------
Adresa: '.$adresa.'
Comanda: '.$comanda.'
Total de plata: '.$pret.' RON
------------------------
 
Multumim pentru achizitie!';
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

?>
</body>
</html>