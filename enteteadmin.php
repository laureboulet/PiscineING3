<?php
	$database = "piscineweb";
	//connectez-vous de votre BDD
	$db_handle = mysqli_connect('localhost', 'root', 'root'); 
	$db_found = mysqli_select_db($db_handle, $database);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrateur </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<nav class="navbar navbar-expand-md">
      	<img src="logo.png" alt="Logo" width="130" height="100"/>
      	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
      	</button>
    	<div class="collapse navbar-collapse" id="main-navigation">
        	<ul class="navbar-nav">
          		<li class="nav-item"><a class="nav-link" href="accueiladmin.html"><strong>Accueil</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="gereritem.php"><strong>Items en vente</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="gerervendeur.php"><strong>Vendeurs</strong></a></li>
          		<li class="nav-item"><a class="nav-link2" href="loginacheteur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li>
        	</ul>
    	</div>
	</nav>
</body>
</html>