<?php
session_start();
include("ajouteritem.php");
include("supprimeritem.php");
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
	<title>Afficher item</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="vendreitem.css">
	<script type="text/javascript">

        $(document).ready(function()
            { $('.header').height($(window).height());
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
          		<li class="nav-item"><a class="nav-link" href="accueilvendeur.php"><strong>Accueil</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="afficheritems"><strong>Items en vente</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="vendreItem.php"><strong>Vendre un item</strong></a></li>
          		<li class="nav-item-compte"><a class="nav-link-compte" href="#"><strong></strong></a></li>
        	</ul>
        	 <ul class="navbar-nav">
                <img src="profil.png" id="profil" alt="Profil" width="100" height="100" border-radius="50">
            </ul>
        </div>
    </nav>
    <header class="page-header header container-fluid">
    	
    	<!--Nom image + image-->
    	    	<div class="container">
	    				<div class="row">
	    					<div class="col-lg-6 col-md-6 col-sm-12">
    							<h3><strong>
									<?php $sql = "SELECT * FROM item";

							    	$result = mysqli_query($db_handle, $sql);
							    		while ($data = mysqli_fetch_assoc($result)) {
							        	$image=$data['Photo1'];
										echo "Nom: " . $data['Nomitem'] . "<br>";?></strong></h3><br>

									<form method="post" method="post" action="supprimeritem.php">
									<td colspan="2" align="left">
									<input type="submit" name="vendreItem2" id="boutton2" value="Supprimer item" /></td></form>
									
								<h3><strong><?php echo "<img src='$image' width='200', height='200'>". "<br>";}?></strong></h3><br>
							</div>
		<!--Description-->	
							<div class="col-lg-6 col-md-6 col-sm-12">

								
								<div class="propriete">
								<p><?php 
								$sql = "SELECT * FROM item";
             					$result = mysqli_query($db_handle, $sql);
        						while ($data = mysqli_fetch_assoc($result)) {


            					$image=$data['Photo1'];
        
                    			echo "Description: " . $data['Description'] . "<br>";
                    			echo "Categorie: " . $data['Categorie'] . "<br>";
               
                    			echo "Typeachat: " . $data['Typeachat'] . "<br>" ."<br>";} ?></p>
                    		</div>  
							</div>

    </header>

    <footer class="page-footer text-center"> 
		<div id="nav">
            <a class="link" href="loginvendeur.php">Login vendeur |</a>
            <a class="link" href="loginacheteur.php">Login acheteur |</a>
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