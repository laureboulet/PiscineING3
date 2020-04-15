<!DOCTYPE html>
<html>

<head>
	 <title>Login Ebay ECE</title>
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
              <li class="nav-item"><a class="nav-link2" href="loginvendeur.html"><strong>Vendre</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="votrecompte.html"><strong>Votre Compte</strong></button></a></li>
              <li class="nav-item"><a class="nav-link2" href="panier.html"><img src="panier.png" alt="Logo" width="65" height="45"/></a></li> 
              <li class="nav-item"><a class="nav-link2" href="loginadmin.html"><strong>Admin</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="loginacheteur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li> 
          </ul>
      </div>
  </nav>

<?php
session_start();
echo " Bonjour "; 
echo $_SESSION['email']; 
echo "! Bonnes recherche de trésors sur Ebay ECE.";
?>

<!-- Pied de page-->
<footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="#">Catégorie |</a>
            <a class="link" href="#">Achat |</a>
            <a class="link" href="loginvendeur.html">Vendre |</a>
            <a class="link" href="#">Votre compte |</a>
            <a class="link" href="#">Panier |</a>
            <a class="link" href="loginadmin.html">Admin</a>
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