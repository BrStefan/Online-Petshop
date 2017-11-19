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

if( isset( $_POST['register-submit'] ) )
{
$name = $_POST['username'];
$email = $_POST['useremail'];
$password = $_POST['userpass'];
$telefon = $_POST['tel'];

$base_url='http://localhost/activation/';

$activation=md5($email.time());

$host = 'mysql.hostinger.ro';
$user = 'u430933815_pet';
$pass = 'stalingrad9';

$con=mysqli_connect($host, $user, $pass);

mysqli_select_db($con,'u430933815_pet');

$insertdata=" INSERT INTO utilizatori (Username,Email,Parola,Activare,Telefon,Produse_Cumparate) VALUES( '$name','$email','$password','$activation','$telefon',0 ) ";

mysqli_query($con,$insertdata);




$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:
http://online-petshop.esy.es/activation.php?email='.$email.'&activation='.$activation.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email


/*require 'i/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'petshopactivation@gmail.com';          // SMTP username
$mail->Password = 'stalingrad9'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('petshopactivation@gmail.com', 'Activare cont');
$mail->addAddress($email);   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = 'Multumim pentru inregistrare! <br>
Contul dumneavoastra a fost creat, va puteti loga cu urmatoarele informatii dupa ce va activati contul accesand link-ul din josul mesajului. <br><br>
 
------------------------<br>
Username: '.$name.'<br>
Password: '.$password.'<br>
------------------------<br><br>
 
Accesati acest link pentru a va creea contul:<br>
http://online-petshop.esy.es/activation.php?email='.$email.'&activation='.$activation.'';

$mail->Subject = 'Inregistrare | Verificare';
$mail->Body    = $bodyContent;

$mail->send();*/


echo '<div class="row"><div class="col-md-offset-3 col-md-6"><div class="contcreat">Contul dumneavoastra a fost creat! Instructiunile de activare a contului au fost trimise pe urmatorul email: '.$email.'<br>Reveniti inapoi <a href="http://online-petshop.esy.es/cont.php">aici</a></div></div></div>';
}
//http://www.localhost/activation.php?email='.$email.'&activation='.$activation.'
else echo '<div class="row"><div class="col-md-offset-5 col-md-6"><div class="contcreat">Acces denied!</div></div></div>';
?>
</div>
</body>
</html>