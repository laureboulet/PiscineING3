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

  <h4>Super ton compte est presque créé !! <br> Indique nous tes coordonnées pour que nous puissions t'envoyer tes futures emplettes</h4>

  <!-- Formulaire de remplissage de coordonnées de l'acheteur -->
    <form class="admin" method="post" action="ajoutercoordonnees.php" >
      <table>
        <tr>
          <td class="creation">Nom (pour la livraison)</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="text" class="coord-acheteur" name="Nomlivr"></td>
        </tr>
        <tr>
          <td class="creation">Prénom (pour la livraison)</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="text" class="coord-acheteur" name="Prenomlivr"></td>
        </tr>
        <tr>
          <td class="creation">Adresse</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="text" class="coord-acheteur" name="Adresse"></td>
        </tr>
        <td class="creation">Ville</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="text" class="coord-acheteur" name="Ville"></td>
        </tr>
          <td class="creation">Code Postal</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="number" class="coord-acheteur" name="CP"></td>
        </tr>
        <tr>
          <td class="creation">Pays</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="text" class="coord-acheteur" name="Pays"></td>
        </tr>
        <tr>
          <td class="creation">Telephone</td>
        </tr>
        <tr>
          <td class="creation"><input required="required" type="number" class="coord-acheteur" name="Telephone"></td>
        </tr>
        <tr>
          <td class="creation"> <br><input type="submit" value="Valider et conclure" name="button3"></td>
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