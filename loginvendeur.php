<?php
//Récupérer les données du formulaire
$nom = isset($_POST["Nomvend"]) ? $_POST["Nomvend"] : "";
$pseudo = isset($_POST["Pseudovend"]) ? $_POST["Pseudovend"] : "";
$mail = isset($_POST["Emailvend"]) ? $_POST["Emailvend"] : "";
$mdp = isset($_POST["Mdpvend"]) ? $_POST["Mdpvend"] : "";
//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Vendeur</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="stylev2.css">-->
    <link rel="stylesheet" type="text/css" href="loginvendeur.css">
    	


    </style>

    <script type="text/javascript">
        $(document).ready(function()
            { $('.header').height($(window).height());
        });

 /*       $(function(){
        	$('#button1').click(function(){

   					$('#pseudo').css('border-color', 'red');
			});
   		});



        	

    </script>

</head>

<body>

	<!--Barre de navigation/menu-->
	<nav class="navbar navbar-expand-md">
      	<img src="logo.png" alt="Logo" width="130" height="100"/>
      	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
      	</button>

    	<div class="collapse navbar-collapse" id="main-navigation">
        	<ul class="navbar-nav">
          		<li class="nav-item"><a class="nav-link" href="#"><strong>Login vendeur</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="#"><strong>Login acheteur</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="#"><strong>Login administrateur</strong></a></li>
        	</ul>
    	</div>
	</nav>

	<!--Message de bienvenue + instructions-->
	<header>
		<div class="bienvenue">
			<h5 class="text-center"><strong>Bienvenue sur le site d'e-commerce Ebay ECE</strong></h5><br>
			<h6 class="text-center"><strong> Connectez-vous à votre compte vendeur</strong></h6>
		</div>

	</header>

	<!--Connexion ou création de compte vendeur-->
	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="choixdeco">Se connecter en tant que vendeur</h3>
			<div align="center">
			<form class="vendeur" action="loginvendeurCo.php" method="post">
    			<table>
					<tr>
						<td class="champs">Pseudo</td><br>
					</tr>

					<tr>
						<td><input required="required" type="text" name="Pseudovend" id ="pseudo" class="login-vendeur"></td>
					</tr>

					<tr>
						<td class="champs">E-mail</td><br>
					</tr>

					<tr>
						<td><input required="required" type="text" name="Emailvend" id ="mail"class="login-vendeur"></td>
					</tr>

					<tr>
						<td class="champs">Mot de passe</td><br>
					</tr>

					<tr>
						<td><input required="required" type="password" name="Mdpvend" id="passw"class="login-vendeur"/></td>
					</tr>

					<tr>

						<td colspan="2" align="center"><input type="submit" name="button1" id="button1" value="Se connecter" /></td>

				</tr>

				</table>
    		</form>
    		</div>
     	</div>

     	<div class="col-lg-6 col-md-6 col-sm-12">
			<h3 class="choixdeco">Créer un compte vendeur</h3>
			<div align="center">
			<?php
			if($_POST["button2"]){
			    if($db_found){
				$sql = "SELECT * FROM vendeur";
				if($pseudo != "") {
				    $sql .= " WHERE Pseudovend LIKE '%$pseudo%'";
				    if($mail != ""){
					$sql .= " AND Emailvend LIKE '%$mail%'";
					if($mdp != ""){
					    $sql .= " AND Mdpvend LIKE '%$mdp%'";
					}
				    }
				}
				$result = mysqli_query($db_handle, $sql);
			    	if (mysqli_num_rows($result) != 0){
					echo "Vous avez déjà crée un compte. Connectez-vous directement sur notre site !";
				}
			    	else{
					$sql = "INSERT INTO vendeur(Nomvend, Pseudovend, Emailvend, Mdpvend) VALUES('$nom', '$pseudo', '$mail', '$mdp')";
					$result = mysqli_query($db_handle, $sql);
					echo "Félicitations ! Votre compte a été crée !  Veuillez vous connecter";
			    	}
			    }
			    else{
			    echo "Database not found";
			    }
			}
			?>
			<form action="loginvendeur.php" method="post" class="vendeur">
    			<table>

    				<tr>
						<td class="champs">Nom</td><br>
					</tr>

					<tr>
						<td><input required="required" type="text" name="Nomvend" id="nom" class="login-vendeur"></td>
					</tr>

						<td class="champs">Pseudo</td><br>
					</tr>

					<tr>
						<td><input required="required" type="text" name="Pseudovend" class="login-vendeur"></td>
					</tr>

					<tr>
						<td class="champs">E-mail</td><br>
					</tr>

					<tr>
						<td><input required="required" type="email" name="Emailvend" class="login-vendeur"></td>
					</tr>

					<tr>
						<td class="champs">Mot de passe</td><br>
					</tr>

					<tr>
						<td><input required="required" type="password" name="Mdpvend" class="login-vendeur"/></td>
					</tr>

					<tr>

						<td colspan="2" align="center"><input type="submit" name="button2" value="Créer son compte"/></td>

				</tr>

				</table>
    		</form>
    		</div>

     	</div>
    </div>
    <footer class="page-footer text-center"> 
		<div id="nav">
            <a class="link" href="loginvendeur.html">Login vendeur |</a>
            <a class="link" href="loginacheteur.html">Login acheteur |</a>
            <a class="link" href="#">Login administrateur |</a>
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
