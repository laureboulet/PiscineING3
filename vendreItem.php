<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Vendre un itemr</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="item.css">
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
          		<li class="nav-item"><a class="nav-link" href="afficheritems.php"><strong>Items en vente</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="vendreItem.php"><strong>Vendre un item</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="decovendeur.php"><strong>Se déconnecter</strong></a></li>
          		<li class="nav-item-compte"><a class="nav-link-compte" href="#"><strong><?php echo $_SESSION['Pseudovend'];?></strong></a></li>
        	</ul>
        	 <ul class="navbar-nav">
                <img src="profil.png" id="profil" alt="Profil" width="100" height="100" border-radius="50">
            </ul>
        </div>
    </nav>

	    	<header class="page-header header container-fluid">
	    	<!-- VOIR DANS NOTE POUR RAJOUTER PHP MESSAGE D'ALERTE-->
	    		<h1><strong>Publiez un item à vendre</strong></h1><br>
	    		<h3><strong>Item n°rajoute codephp numitem incrémenté</strong></h3>
	    		<form class="item" action="ajouteritem.php" method="post" enctype="multipart/form-data">
	    			<div class="container">
	    				<div class="row">
	    					<div class="col-lg-6 col-md-6 col-sm-12">
	    						<table>
	    						<tr>
	    							<td class="champs">Nom</td><br>
	    						</tr>
	    						<tr>
	    							<td><input required="required" type="text" name="Nomitem"class="ajout-item"></td>
	    						</tr>
	    						<tr>
	    							<td class="champs"> Description </td><br>
	    						</tr>
	    						
	    						<tr>
	    							<td><textarea required="required" name="Description"class="ajout-item"></textarea></td>
	    						</tr>
	    						<tr >
									<td class="text-danger" > <br><br><br>Remarque : aucun item peut être à vendre par enchère et par meilleure offre en même temps!</td>
								</tr>
	    						
								</table>
	    					</div>
	    					<div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:350px;">
   								<table>
   									<tr>
   										<td class="champs"> Photo </td>
									</tr>
   									<tr>
   										<td class="encadre"><label for="photoitem" class="imageItem">Choisir une photo</label><input type="file" id="photoitem" name="Photo1" class="inputcache" accept="image/png"></td>
   									</tr>
   									<tr>
   										<td class="champs"> Vidéo(si disponible) </td>
   									</tr>
   									<tr>
   										<td class="encadre"><label for="photoitem" class="imageItem">Choisir une vidéo</label><input type="file" id="photoitem" class="inputcache" accept="video/mp4"></td>
   									</tr>
   									</table>
   							</div>

   							<div class="col-lg-2 col-md-2 col-sm-12" >
   								<table class="choixmultiple">
								<tr>
									<td class="champs" width="300"> Catégorie </td>
									<td class="champs" id="typeachat" width="300"> Achat </td>
									<td class="champs" id="prix"> Prix </td>
								</tr>

								<tr>

									<td> 
										<div class="categorie" style="width:200px;">
											<select id="categorie" name="Categorie" required="required">
   											<option value=""></option>
   											<option value="Ferraille ou Trésor">Ferraille ou Trésor</option>
   											<option value="Bon pour le Musée">Bon pour le Musée</option>
   											<option value="Accessoire VIP">Accessoire VIP</option>

											</select>
										</div>
									</td>

									<td>
										<div class="Typeachat" style="width:200px;">
											<select id="Typeachat" name="Typeachat" required="required">
   											<option value=""></option>
   											<option value="Enchères">Enchères</option>
   											<option value="Meilleure offre">Meilleure offre</option>
   											<option value="Achat immédiat">Achat immédiat</option>
   											<option value="Enchères et Achat immédiat">Enchères et Achat immédiat</option>
   											<option value="Meilleure offre et Achat immédiat">Meilleure offre et Achat immédiat</option>


											</select>
										</div>
									</td>

									<td ><input required="required" type="text" name="Prixitem" id ="prix" class="ajout-item"></td>
									<td style="font-size: 20px">€</td>


	    					   	<td class="ajout" colspan="2" align="left"><input type="submit" name="vendreItem" id="boutton" value="Ajouter item" /></td>
	    					   	
   							</tr>
   						</table>
   					</div></div></div>


	 </form>
	    		

	    		
</header>



	<footer class="page-footer text-center"> 
		<div id="nav">
            <a class="link" href="accueilvendeur.php">Accueil |</a>
            <a class="link" href="afficheritems.php">Items en vente |</a>
            <a class="link" href="vendreItem.php">Vendre un item</a>
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