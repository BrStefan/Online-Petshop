<html>
<head>
<title>
Cont
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://online-petshop.esy.es/style.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<script>
$(function() {
    $('#login-form-link').click(function(e) {
    	$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

function checkname()
{
 var name=document.getElementById( "UserName" ).value;
	
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="Nume de utilizator disponibil")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}

function checkemail()
{
 var email=document.getElementById( "UserEmail" ).value;
	
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#email_status' ).html(response);
   if(response=="E-mail disponibil")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#email_status' ).html("");
  return false;
 }
}

function checkpass()
{
 var email1=document.getElementById( "confirm-password" ).value;
 var email2=document.getElementById( "UserPassword" ).value;
	
 if(email1)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_email1:email1,
   user_email2:email2,
  },
  success: function (response) {
   $( '#email_status1' ).html(response);
   if(response=="Cele doua parole se potrivesc")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#email_status1' ).html("");
  return false;
 }
}

function checktel()
{
 var telefon=document.getElementById( "tel" ).value;
	
 if(telefon)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_tel:telefon,
  },
  success: function (response) {
   $( '#tel_status' ).html(response);
   if(response=="Ok")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#tel_status' ).html("");
  return false;
 }
}

function checkall()
{
 var namehtml=document.getElementById("name_status").innerHTML;
 var emailhtml=document.getElementById("email_status").innerHTML;
 var passhtml=document.getElementById("email_status1").innerHTML;
 var parola=document.getElementById("password").innerHTML;
 var telefon=document.getElementById("tel_status1").innerHTML;

 if(namehtml=='<p style="color: green;">Nume de utilizator disponibil</p>' && emailhtml== '<p style="color: green;">E-mail disponibil</p>' && passhtml == '<p style="color: green;">Cele doua parole se potrivesc</p>' && telefon=='<p style="color: green;">Ok</p>')
 {
  return true;
 }	 
 else
 {
  return false;
 }
}

function verifica()
{
	 var nume=document.getElementById("username").innerHTML;
	 var parola=document.getElementById("parola").innerHTML;
	 if(strlen(nume)==0 || strlen(parola)==0)return false;
	 else return true;
}


</script>


<div class="container">
<center><img src="http://imgur.com/Y3KowGu.png" height="400" width="300"></center><br><br><br><br>
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="login.php" method="post" role="form" style="display: block;" onsubmit="return verifica();">
                <h2>LOGIN</h2>
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" >
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
                  </div>
                  <div class="col-lg-12 col-lg-offset-1 form-group center-block">     
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                  </div>
              </form>
              <form id="register-form" method="post" role="form" style="display: none;" action="http://online-petshop.esy.es/insertdata.php" onsubmit="return checkall();">
                <h2>REGISTER</h2>
                  <div class="form-group">
                    <input type="text" name="username" id="UserName" tabindex="1" class="form-control" placeholder="Username" value="" onkeyup="checkname();">
					<span id="name_status"></span>
                  </div>
                  <div class="form-group">
                    <input type="text" name="useremail" id="UserEmail" tabindex="1" class="form-control" placeholder="Email Address" value="" onkeyup="checkemail();">
					<span id="email_status"></span>
                  </div>
                  <div class="form-group">
                    <input type="password" name="userpass" id="UserPassword" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" onkeyup="checkpass();">
					<span id="email_status1"></span>
                  </div>
				  <div class="form-group">
                    <input type="text" name="tel" id="tel" tabindex="2" class="form-control" placeholder="Numar de telefon" onkeyup="checktel();">
					<span id="tel_status"></span>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
			  </form>
            </div>
          </div>
        </div>
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6 tabs">
              <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
            </div>
            <div class="col-xs-6 tabs">
              <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
