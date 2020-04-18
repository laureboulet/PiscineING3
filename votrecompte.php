<!DOCTYPE html>
<html>

<head>
	 <title>Votre compte Ebay ECE</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="loginacheteur.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>


<body>
	<!--Barre de navigation/menu-->
  <nav class="navbar navbar-expand-md">
        <img src="logo.png" alt="Logo" width="130" height="100"/> 
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="main-navigation">
          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link2 dropdown-toggle" href="achat.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Catégories</strong></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ferraille ou Trésor</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Bon pour le Musée</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Accessoire VIP</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Achat</strong></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Enchères</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Achat immédiat</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Meilleure offre</a>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link2" href="loginvendeur.php"><strong>Vendre</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="#"><strong>Votre Compte</strong></button></a></li>
              <li class="nav-item"><a class="nav-link2" href="panier.php"><img src="panier.png" alt="Logo" width="65" height="45"/></a></li> 
              <li class="nav-item"><a class="nav-link2" href="loginadmin.php"><strong>Admin</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="loginacheteur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li> 
          </ul>
      </div>
  </nav>

<!-- Message d'accueil votre compte -->
<h3 style="text-align: center;">Bonjour 
<?php
session_start();
echo $_SESSION['prenomach']; 
?>,
  vous êtes sur votre espace personnel </h3>
 <br><br>
<p style="color:  #457A68"><I> Vous pouvez modifier vos informations personnelles et bancaires à tout moment en cliquant sur "Modifier" en bas de page. </I></p>


<!-- Affichage des informations personnelles dans un formulaire qu'on ne peut pas modifier -->


<form>
	<fieldset disabled>
  <div class="form-row" style="padding-left: 17px;">
    <div class="form-group col-md-4 ">
      <label for="inputEmail4">Nom (pour la livraison)</label>
      <input type="text" class="form-control" id="Nomlivr"  value="<?php echo $_SESSION['nomlivr'];?>">
    </div>
    <div class="form-group col-md-4  ">
      <label for="inputPassword4">Prénom (pour la livraison)</label>
      <input type="text" class="form-control" id="Prenomlivr"  value="<?php echo $_SESSION['prenomlivr'];?>">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Addresse</label>
    <input type="text" class="form-control" id="Addresse" value="<?php echo $_SESSION['adresseach'];?>">
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Ville</label>
    <input type="text" class="form-control" id="Ville" value="<?php echo $_SESSION['villeach'];?>">
  </div>
  <div class="form-row" style="padding-left: 17px;">
    <div class="form-group col-md-3">
      <label for="inputCity">Code Postal</label>
      <input type="number" class="form-control" id="CP" value="<?php echo $_SESSION['cpach'];?>">
    </div>
    <div class="form-group col-md-4 ">
      <label for="inputState">Pays</label>
      <input type="text" class="form-control" id="Pays" value="<?php echo $_SESSION['paysach'];?>">
    </div>
  </div>
  <div class="form-group col-md-4  ">
      <label for="inputState">Telephone</label>
      <input type="number" class="form-control" id="Telephone" value="<?php echo $_SESSION['telephoneach'];?>">
  </div>
  </fieldset>
  <button type="button" class="btn creation" data-toggle="modal" data-target="#exampleModal" >Modifier les coordonnées de livraison</button></td>

</form>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification des données</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="modification.php">
      <div class="modal-body">
<p> Changez les champs souhaités </p> <br><br>


		  <div class="form-row" style="padding-left: 17px;">
		    <div class="form-group col-md-4 ">
		      <label for="inputEmail4">Nom (livraison)</label>
		      <input type="text" class="form-control" name="Nomlivr"  value="<?php echo $_SESSION['nomlivr'];?>">
		    </div>
		    <div class="form-group col-md-4  ">
		      <label for="inputPassword4">Prénom (livraison)</label>
		      <input type="text" class="form-control" name="Prenomlivr"  value="<?php echo $_SESSION['prenomlivr'];?>">
		    </div>
		  </div>
		  <div class="form-row" style="padding-left: 17px;">
		  <div class="form-group col-md-6">
		    <label for="inputAddress">Addresse</label>
		    <input type="text" class="form-control" name="Adresse" value="<?php echo $_SESSION['adresseach'];?>">
		  </div>
		  <div class="form-group col-md-3">
		    <label for="inputAddress2">Ville</label>
		    <input type="text" class="form-control" name="Ville" value="<?php echo $_SESSION['villeach'];?>">
		  </div>
		</div>
		  <div class="form-row" style="padding-left: 17px;">
		    <div class="form-group col-md-3">
		      <label for="inputCity">Code Postal</label>
		      <input type="number" class="form-control" name="CP" value="<?php echo $_SESSION['cpach'];?>">
		    </div>
		    <div class="form-group col-md-4 ">
		      <label for="inputState">Pays</label>
		      <input type="text" class="form-control" name="Pays" value="<?php echo $_SESSION['paysach'];?>">
		    </div>
		    <div class="form-group col-md-4  ">
		      <label for="inputState">Telephone</label>
		      <input type="number" class="form-control" name="Telephone" value="<?php echo $_SESSION['telephoneach'];?>">
		  </div>
		  </div>
	<br> <br> <br>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn_2 btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn " name="button4">Enregistrer les modifications</button>
      </div> 
    </form>
    </div>
  </div>
</div>





<!-- les coordonnées bancaires -->


<!-- Affichage de la carte actuellement enrgistrée -->

 <form method="post" action="modifiercarte.php">
 	<fieldset disabled>
 	 <div class="form-group col-md-6 ">
          <label for="inputEmail4">Nom du titulaire</label>
          <input type="text" class="form-control" name="Nomtitulaire" value="<?php echo $_SESSION['nomtitulaire'];?>">
        </div>
        <div class="form-group col-md-6  ">
          <label for="inputPassword4">Numéro de carte</label>
          <input type="number" class="form-control" name="Numero" placeholder="<?php $num=substr_replace( $_SESSION['numerocb'], 'XXXXXXXXXXXXXX',4,  12); echo $num; ?>">
        </div>
        <div class ="form-group col-md-6">
          <label for="Type carte" > Type de carte</label>
          <input type="text" class="form control" name="Type" value="<?php echo $_SESSION['typecb'];?>">
        </div>
      
      <div class="form-row" style="padding-left: 17px;">
      <div class="form-group col-md-4">
        <label for="inputAddress">Date d'expiration</label>
        <input type="text" class="form-control" name="Date_expiration"  value="<?php echo $_SESSION['date_expiration'];?>">
      </div>
      <div class="form-group col-md-4">
        <label for="inputAddress2">Cryptogramme</label>
        <input type="number" class="form-control" name="Cryptogramme"  placeholder="XXX">
      </div>
    </div>
</fieldset>
<button type="button" class="btn creation" data-toggle="modal" data-target="#modifcarte" >Modifier les informations concernant cette carte</button></td>
</form>



<!-- changer de carte -->

    
<div class="modal fade" id="modifcarte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Veuillez entrer vos coordonnées bancaires</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="modifiercarte.php">
      <div class="modal-body">

        <div class="form-group col-md-6 ">
          <label for="inputEmail4">Nom du titulaire</label>
          <input type="text" class="form-control" name="Nomtitulaire" value="<?php echo $_SESSION['nomtitulaire'];?>">
        </div>
        <div class="form-group col-md-6  ">
          <label for="inputPassword4">Numéro de carte</label>
          <input type="number" class="form-control" name="Numero" placeholder="<?php $num=substr_replace( $_SESSION['numerocb'], 'XXXXXXXXXXXXXX',4,  12); echo $num; ?>">
        </div>
        <div class ="form-group col-md-6">
          <label for="Type carte" > Selectionnez un type de carte</label>
          <select required ="required" class="form control" name="Type" value="<?php echo $_SESSION['typecb'];?>">
            <option value="Visa">Visa</option>
            <option value="MasterCard"> Master Card</option>
            <option value="Amex">American Express</option>
            <option value="Paypal">PayPal</option>
          </select>
        </div>
      
       <div class="form-row" style="padding-left: 17px;">
      <div class="form-group col-md-4">
        <label for="inputAddress">Date d'expiration</label>
        <input type="text" class="form-control" name="Date_expiration"  value="<?php echo $_SESSION['date_expiration'];?>">
      </div>
      <div class="form-group col-md-4">
        <label for="inputAddress2">Cryptogramme</label>
        <input type="number" class="form-control" name="Cryptogramme"  placeholder="XXX">
      </div>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn_2 btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn " name="button5">Enregistrer les modifications</button>
      </div> 
    </form>
    </div>
  </div>
</div>


<!-- Pied de page-->
<footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="#">Catégorie |</a>
            <a class="link" href="#">Achat |</a>
            <a class="link" href="loginvendeur.php">Vendre |</a>
            <a class="link" href="#">Votre compte |</a>
            <a class="link" href="#">Panier |</a>
            <a class="link" href="loginadmin.php">Admin</a>
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