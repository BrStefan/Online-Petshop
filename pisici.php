<html>
<head>
<title>
PetShop- Produse pentru pisici
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://online-petshop.esy.es/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><img src="http://imgur.com/Y3KowGu.png" height="400" width="300"></center><br>
<div class="container">
	<div class="row">
		<nav class="navbar navbar-inverse" role="navigation">
		  <div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand visible-xs-inline-block nav-logo" href="/"><img src="/images/logo-dark-inset.png" class="img-responsive" alt=""></a>
			</div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav js-nav-add-active-class">
            <li ><a href="/index.html">Prima pagina</a></li>
            <li ><a href="/caini.php">Caini</a></li>
            <li class="active"><a href="/pisici.php">Pisici</a></li>
            <li><a href="/rozatoare.php">Rozatoare</a></li>
			<li><a href="/contact.php">Contact</a></li>
            <li class="visible-xs-block"><a href="http://online-petshop.esy.es/cont.php">Intra in cont</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right hidden-xs">
            <a type="button" class="navbar-btn btn btn-gradient-blue" am-latosans="bold" href="http://online-petshop.esy.es/cont.php">Intra in cont</a>
          </ul>
        </div><!-- /.navbar-collapse -->
		 </div>
		</nav>
	</div>
	<div class="paragraphs">
		 <?php
					$servername = "mysql.hostinger.ro";
					$username = "u430933815_pet";
					$password = "stalingrad9";
					$dbname = "u430933815_pet";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$sql = "SELECT * FROM pisici";
					$result = mysqli_query($conn, $sql);
					$num_rows = mysqli_num_rows($result);
					if (mysqli_num_rows($result) > 0)
						 while($row = mysqli_fetch_assoc($result))
						 {
							 $num_rows--;
							 if($num_rows>0)
							 {
								 echo'<div class="row">
										<div class="span4">
											<div class="clearfix content-heading">';
								echo '<br><br><br><img class="pull-left" src='.$row["URL"].' width="300" height="300">';
								echo '<div class="info">Denumire produs: '.$row["Nume produs"].'<br>Cantitate: '.$row["Cantitate"].' bucati<br>Pret: '.$row["Pret"].' lei</div>';
								echo'</div></div></div>';
								echo '<hr class="style-seven">';
							 }
							 else 
							 {
								echo'<div class="row">
										<div class="span4">
											<div class="clearfix content-heading">';
								echo '<br><br><br><img class="pull-left" src='.$row["URL"].' width="300" height="300">';
								echo '<div class="info">Denumire produs: '.$row["Nume produs"].'<br>Cantitate: '.$row["Cantitate"].' bucati<br>Pret: '.$row["Pret"].' lei</div>';
								echo'</div></div></div>'; 
							 }
						 }
				?> 
	</div>
</body>
</html>