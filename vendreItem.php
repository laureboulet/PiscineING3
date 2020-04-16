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

    <link rel="stylesheet" href="vendreitem.css">
	<script type="text/javascript">

        $(document).ready(function()
            { $('.header').height($(window).height());
            });

		/*    $(document).ready(function(){
        	$('#button1').click(function(){
				if($('#enchere').is(':checked') || $('#offre').is(':checked'))
				{
 					alert("Item ajouté");
				}
				else{
					alert("Faux");
				}
			}
		});	*/

		/*function validate(){
			function validateNom();
			function validateDescri();
			function validateCategorie();
			function validateAchat();
		}

		function validateNom(){
			var nom = document.getElementById("nom");

			if(nom == '') {
				
				ajout-item.description.style.border = "1px solid red";
			}
			else{
				ajout-item.description.style.border = "1px solid grey";
			}

		}

		function validateDescri(){
			var description = document.getElementById("description");

			if(description == '') {
				
				ajout-item.nom.style.border = "1px solid grey";
			}
			else{
				
			}

		}
		function validateCategorie(){
			var categorie = document.getElementById("catégorie");

			if(!categorie.required) {
				
				categorie.style.border = "1px solid red";
			}
			else{
				categorie.style.border = "1px solid #ccc";
			}

		}

		function validateAchat(){

			if(document.getElementById("encheres").checked || document.getElementById("offre").checked) {
				alert("Item ajouté!");
				
			}
			else{
				
				alert("Choisissez Enchères ou Meilleure offre!");
			}


		}*/

   
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
          		<li class="nav-item"><a class="nav-link" href="#"><strong>Items en vente</strong></a></li>
          		<li class="nav-item"><a class="nav-link" href="vendreItem.html"><strong>Vendre un item</strong></a></li>
          		<li class="nav-item-compte"><a class="nav-link-compte" href="#"><strong><?php echo $_SESSION['Pseudovend'];?></strong></a></li>
        	</ul>
        	 <ul class="navbar-nav">
                <img src="profil.png" id="profil" alt="Profil" width="100" height="100" border-radius="50">
            </ul>
        </div>
    </nav>

	    	<header class="page-header header container-fluid">
	    		<h1><strong>Publiez un item à vendre</strong></h1><br>
	    		<h3><strong>Item n°rajoute codephp numitem incrémenté</strong></h3>
	    		<form class="item">
	    			<div class="container">
	    				<div class="row">
	    					<div class="col-lg-6 col-md-6 col-sm-12">
	    						<table>
	    						<tr>
	    							<td class="champs">Nom</td><br>
	    						</tr>
	    						<tr>
	    							<td><input required="required" type="text" name="Nomitem" id ="nom" class="ajout-item"></td>
	    						</tr>
	    						<tr>
	    							<td class="champs"> Description </td><br>
	    						</tr>
	    						
	    						<tr>
	    							<td><textarea required="required" name="Description" id ="description" class="ajout-item"></textarea></td>
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
	    								<td class="encadre"><label for="photoitem" class="imageItem">Choisir une photo</label><input type="file" id="photoitem" class="inputcache" accept="image/png"></td>
	    							</tr>
	    							<tr>
	    								<td class="champs"> Vidéo(si disponible) </td>
	    							</tr>
	    							<tr>
	    								<td class="encadre"><label for="photoitem" class="imageItem">Choisir une vidéo</label><input type="file" id="photoitem" class="inputcache" accept="image/png"></td>
	    							</tr>
	    						</table>
	    					</div>

	    					<div class="col-lg-2 col-md-2 col-sm-12" >
	    						<table class="choixmultiple" style="cellspacing:30px;">
									<tr>
										<td class="champs" width="300"> Catégorie </td>
										<td class="champs" id="typeachat" width="300"> Achat </td>
										<td class="champs" id="prix"> Prix </td>
										
									</tr>

							<tr>

								<td> 
									<div class="categorie" style="width:200px;">
										<select id="categorie" required="required">
	    									<option value=""></option>
	    									<option value="feraille">Féraille ou Trésor</option>
	    									<option value="musee">Bon pour un musée</option>
	    									<option value="vip">Accesoire VIP</option>

										</select>
									</div>
								</td>

								<td>
									<input id="encheres" type="radio" name="achat" value="encheres" required value="encheres" >
	  								<label for="encheres">Enchères!</label>

	 								<input id="offre" type="radio" name="achat" value="offre">
	  								<label for="offre">Meilleure offre</label>

	  								<input id="immediat" type="radio" checked="checked" disabled="true">
	 						 		<label for="immediat">Achat Immédiat</label>
	 						 	</td>

	 						 	<td ><input required="required" type="text" name="prixItem" id ="prix" class="ajout-item"></td>
	 						 	<td style="font-size: 20px">€</td>


	    						
	    							<td class="ajout" colspan="2" align="left"><input type="submit" name="vendreItem" id="boutton" value="Se connecter" /></td>
	    				
							</tr>
							</div>


						</table>

	    				</div>
	    					    

	    		</form>
	    		

	    		
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