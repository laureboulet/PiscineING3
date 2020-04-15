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
              <li class="nav-item"><a class="nav-link" href="loginvendeur.html"><strong>Login vendeur</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="#"><strong>Login acheteur</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="loginadmin.html"><strong>Login administrateur</strong></a></li>
          </ul>
      </div>
  </nav>

  <h4>Créez votre compte en quelques cliques et accédez aux plus belles trouvailles du marché<h4>

  	<!-- Formulaire de création du compte -->
  	<form class="admin" method="post" action="ajouteracheteur.php" >
		  <table>
		    <tr>
		      <td class="creation">Nom</td>
		    </tr>
		    <tr>
		      <td class="creation"><input required="required" type="nom" class="login-acheteur" name="Nomach"></td>
		    </tr>
		    <td class="creation">Prenom</td>
		    </tr>
		    <tr>
		      <td class="creation"><input required="required" type="prenom" class="login-acheteur" name="Prenomach"></td>
		    </tr>
		      <td class="creation">E-mail</td>
		    </tr>
		    <tr>
		      <td class="creation"><input required="required" type="email" class="login-acheteur" name="Emailach"></td>
		    </tr>
		    <tr>
		      <td class="creation">Mot de passe</td>
		    </tr>
		    <tr>
		      <td class="creation"><input required="required" type="password" class="login-acheteur" name="Mdpach"></td>
		    </tr>
		    <tr>
		      <td class="creation"><a href="#">Accéder aux conditions générales d'utilisation</a></td>
		    </tr>
		    <tr>
		    	<td class="creation"><div style="display: flex; margin-top: 2%;"><input required="required" style="margin-top: 1.5%; margin-right: 2.5px;" id="accept" name="accept" type="checkbox" value="y">J'ai lu et j'accepte les conditions d'utilisation</div></td>
		    </tr>
		    <tr>
		      <td class="creation"> <br><input type="submit" value="Créer mon compte" name="button2"></td>
		    </tr>
		  </table>
	</form>

	<!-- pied de page -->
    <footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="loginvendeur.html">Login vendeur |</a>
            <a class="link" href="#">Login acheteur |</a>
            <a class="link" href="loginadmin.html">Login administrateur |</a>
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