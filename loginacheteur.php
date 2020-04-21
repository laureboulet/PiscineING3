<!DOCTYPE html>
<html>

<head>
	 <title>Login Ebay ECE</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="acheteurlog.css" rel="stylesheet" type="text/css"/>
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
              <li class="nav-item"><a class="nav-link" href="loginvendeur.php"><strong>Login vendeur</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="loginacheteur.php"><strong>Login acheteur</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="loginadmin.php"><strong>Login administrateur</strong></a></li>
          </ul>
      </div>
  </nav>

  <?php
    // Démarrage ou restauration de la session
    session_start();
    // Réinitialisation du tableau de session
    // On le vide intégralement
    $_SESSION = array();
    // Destruction de la session
    session_destroy();
    // Destruction du tableau de session
    unset($_SESSION);
  ?>

  <br>
	<h5 class="text-center">Bienvenue sur le site d'e-commerce Ebay ECE</h5>
	<h6 class="text-center">Connectez-vous à votre compte acheteur</h6>
	<br>

  		<div class="row">

        <!-- formulaire à remplir pour se connecter-->
  		  <div class="col-lg-6 col-sm-12 col-md-6" align = center><strong>SE CONNECTER</strong>
          <form class="admin" method="post" action="loginacheteurCo.php">
              <table align=center>
                <tr>
                  <td>Nom</td>
                </tr>
                <tr>
                  <td ><input required="required" type="text" class="login-acheteur" name="Nomach"></td>
                </tr>
                <td>Email</td>
                </tr>
                <tr>
                  <td ><input required="required" type="email" class="login-acheteur" name="Emailach"></td>
                </tr>
                  <td>Mot de passe</td>
                </tr>
                <tr>
                  <td ><input required="required" type="password" class="login-acheteur" name="Mdpach"></td>
                </tr>
                <tr>
                  <td><input required="required" type="submit" value="Connexion" name="button1"></td>
                </tr>
              </table>
          </form>
        </div>

		    <div class="col-lg-6 col-sm-12 col-md-6" align = center><strong>CREER UN COMPTE</strong>
          <form class="admin" method="post">
            <table align=center>
              <br><br><br>
              <tr>
                <td><a class="nav-link" href="loginacheteur2.php"><input type="button" value="Cliquez ici pour vous créer un compte" name="button"></a></td>
            </table>
          </form>
        </div>

	    </div>

<!-- pied de page -->
    <footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="loginvendeur.php">Login vendeur |</a>
            <a class="link" href="loginacheteur.php">Login acheteur |</a>
            <a class="link" href="loginadmin.php">Login administrateur |</a>
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