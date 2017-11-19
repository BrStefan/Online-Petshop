<?php

$host = 'mysql.hostinger.ro';
$user = 'u430933815_pet';
$pass = 'stalingrad9';

$con=mysqli_connect($host, $user, $pass);

mysqli_select_db($con,'u430933815_pet');

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata=" SELECT * FROM `utilizatori` WHERE `Username`='$name' ";

 $query=mysqli_query($con,$checkdata);
 $query1=$name;
 
 if(strlen($query1)<4)
 {
	 echo '<p style="color: red;"> Numele de utilizator ales este prea scurt (Minim 4 caractere) </p>';
 }
 else if(strlen($query1)>30)
 {
	 echo '<p style="color: red;"> Numele de utilizator ales este prea lung (Maxim 30 de caractere) </p>';
 }
 else if(mysqli_num_rows($query)>0)
 {
	 echo '<p style="color: red;">Numele de utilizator ales este deja ales!</p>';
 }
 else
 {
  echo '<p style="color: green;">Nume de utilizator disponibil</p>';
 }
 exit();
}

if(isset($_POST['user_email']))
{
 $emailId=$_POST['user_email'];

 $checkdata=" SELECT * FROM `utilizatori` WHERE `Email`='$emailId' ";

 $query=mysqli_query($con,$checkdata);
 
 if(strlen($emailId)==0)
 {
	 echo '<p style="color: red;">Introduceti o adresa de email</p>';
 }
 else if(mysqli_num_rows($query)>0)
 {
  echo '<p style="color: red;">E-mail introdus este deja folosit</p>';
 }
 else
 {
  echo '<p style="color: green;">E-mail disponibil</p>';
 }
 exit();
}

if(isset($_POST['user_email1']))
{
 $pass=$_POST['user_email1'];
 $pass1=$_POST['user_email2'];
 
 if(strlen($pass1)==0)echo '<p style="color: red;">Introduceti o parola pentru contul dumneavoastra</p>';
 else if(strlen($pass)==0)echo '<p style="color: red;">Introduceti din nou parola</p>';

 else if($pass!=$pass1)
 {
  echo '<p style="color: red;">Cele doua parole nu sunt identice</p>';
 }
 else
 {
  echo '<p style="color: green;">Cele doua parole se potrivesc</p>';
 }
 exit();
}

if(isset($_POST['user_tel']))
{
 $telefon=$_POST['user_tel'];
 
 if(strlen($telefon)!=10 || !ctype_digit($telefon) )echo '<p style="color: red;">Introduceti un numar de telefon valid din Romania</p>';
 else echo '<p style="color: green;">Ok</p>';
 exit();
}

?>