<?php
	$database = "piscineweb";
	//connectez-vous de votre BDD
	$db_handle = mysqli_connect('localhost', 'root', 'root'); 
	$db_found = mysqli_select_db($db_handle, $database);	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login administrateur</title>
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
          		<li class="nav-item"><a class="nav-link" href="loginvendeur.php"><strong>Login vendeur</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="loginacheteur.php"><strong>Login acheteur</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="loginadmin.php"><strong>Login administrateur</strong></a></li>
        	</ul>
    	</div>
	</nav>
	<div align="center" class="login">
		<h3>Bonjour, connectez-vous à l'espace administrateur</h3> 
		<?php
			$emailad = isset($_POST["emailad"])? $_POST["emailad"] : "";
			$mdpad = isset($_POST["mdpad"])? $_POST["mdpad"] : "";
			if (isset($_POST['buttonadmin'])) {
				if($db_found){
					$sql = "SELECT * FROM administrateur";
					if ($emailad != "") {
						$sql .= " WHERE Emailad LIKE '%$emailad%'"; 
						if ($mdpad != "") {
						$sql .= " AND Mdpad LIKE '%$mdpad%'";
						}
					} 
					$result = mysqli_query($db_handle, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "pas d'administrateur à ce nom"; 
					} 
					else {
						while ($data = mysqli_fetch_assoc($result)) { 
							//demarrage d'une session
							session_start();
							$recupId = "SELECT Idad FROM administrateur WHERE Emailad='$emailad' AND Mdpad='$mdpad'";
							$result2 = mysqli_query($db_handle,$recupId);
							$row = mysqli_fetch_array($result2);
							$id = $row['Idad'];
							$_SESSION['Idad']=$id;
							header('Location: accueiladmin.html');
							exit();			
						} 
					}
				}
				else{
					echo "database not found";
				}
			}
		?>
		<form action="loginadmin.php" class="admin" method="post">
			<table>
				<tr>
					<td>E-mail</td>
				</tr>
				<tr>
					<td><input required="required" type="email" class="login-admin" name="emailad"></td>
				</tr>
				<tr>
					<td>Mot de passe</td>
					
				</tr>
				<tr>
					<td><input required="required" type="password" class="login-admin" name="mdpad">
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Connexion" name="buttonadmin"></td>
				</tr>
			</table>
		</form>
	</div>
	<footer class="page-footer text-center"> 
		<div id="nav">
            <a class="link" href="loginvendeur.php">Login vendeur |</a>
            <a class="link" href="loginacheteur.php">Login acheteur |</a>
            <a class="link" href="loginadmin.php">Login administrateur</a>
        </div>
        <br>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">A propos de nous</h6> 
					<h7><a class="info" href="#">Qui sommes-nous?</a></h7><br>
					<h7><a class="info" href="#">Notre histoire</a></h7>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">Informations légales</h6>
					<h7><a class="info" href="#">Conditions générales d'utilisation</a></h7><br>
					<h7><a class="info" href="#">Conditions générales de vente</a></h7><br>
					<h7><a class="info" href="#">Vie privée / Cookies</a></h7>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">Nous contactez</h6>
					<p>
					Ebay ECE <br>
					37, quai de Grenelle, <br>
					75015 Paris, France <br> 
					<a style="color:#7EC6A3" href="mailto:ebayece@edu.ece.fr">ebayece@edu.ece.fr</a>
					</p> 
				</div>
				<div>
					<h6 class="text-uppercase font-weight-bold">Retrouvez-nous sur</h6>
					<img src="facebook.png" alt="facebook" width="20" height="20"/>
					<img src="instagram.png" alt="instagram" width="20" height="20"/>
					<img src="twitter.png" alt="twitter" width="20" height="20"/>
					<img src="linkedin.png" alt="linkedin" width="20" height="20"/>
				</div>
			</div>
			<div style="color:#7EC6A3" id="footer-copyright">N°1 de site de vente en ligne
			</div> 
		</div>
	</footer>
</body>
</html>
<?php
	mysqli_close($db_handle);
?>
