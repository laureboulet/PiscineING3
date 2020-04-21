<?php
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Enchère zoom</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="acheteur.css">
</head>

<body>
  <!-- Navigation --> 
  <nav class="navbar navbar-expand-md fixed-top">
    <img src="logo.png" alt="Logo" width="130" height="100"/>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="main-navigation">
          <ul class="navbar-nav">
            <form method="post" action="categorie.php" class="item nav-link2">
              <input class="list-group-item" type="submit" name="categorie" value="Catégories">
            </form>
            <form method="post" action="achat.php" class="item nav-link2">
              <input class="list-group-item" type="submit" name="achat" value="Achat">
            </form>
              <li class="nav-item"><a class="nav-link2" href="loginvendeur.php"><strong>Vendre</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="votrecompte.php"><strong>Votre compte</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="panier.php"><img src="panier.png" alt="Logo" width="65" height="45"/></a></li> 
              <li class="nav-item"><a class="nav-link2" href="loginadmnin.php"><strong>Admin</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="loginacheteur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li>
          </ul>
      </div>
  </nav> 


<?php
 $iditem=$_GET["iditem"];
 
  $idach = $_SESSION['idach'];

?>
  <!-- Page Content -->
  <div class="container" style="padding-top: 120px">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4 ">Ebay ECE</h1>
        <div class="list-group">
          <a href="javascript:history.go(-1)" class="list-group-item">Revenir au panier</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <?php 
          $database = "piscineweb";
          //connectez-vous de votre BDD
          $db_handle = mysqli_connect('localhost', 'root', 'root'); 
          $db_found = mysqli_select_db($db_handle, $database);
          $iditem=$_GET["iditem"];
          $idach=$_SESSION['idach'];
            
          $sql = "SELECT * FROM item WHERE Iditem=$iditem"; 
           
          $result=mysqli_query($db_handle,$sql);
          $stack = array();
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
              $stack = ($row);      
          }          
        ?>

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?php echo $stack['Photo1'] ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $stack['Nomitem'] ?> </h3><br>
            <h4> <?php echo $stack['Prixitem'] ?>€</h4><br>
            <p class="card-text"><?php echo $stack['Description'] ?></p><br><br>
            <button type="submit" class="btn" data-toggle="modal" data-target="#ajoutenchere">Participer aux enchères</button>
           <div class="modal fade" id="nouvelleoffre" tabindex="-1" role="dialog" aria-labelledby="ajoutenchere" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Entrez le montant maximum que vous souhaitez enchérir sur cet article</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" >
                            <div class="modal-body">
                              <input type="number" name="Prixmax" required="">Prix en €</inmput>
                              <input type="number" name="iditem" value="<?php echo $iditem; ?>" style="display: none;"></inmput>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="button12" class="btn btn-primary">Encherir</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>

<?php echo "<script>alert(\"Bonjour, les enchères seront très prochainement disponibles ! Merci de votre compréhension.\")</script>"; //header("Location:panier.php");?>
          </div>
        </div>
      

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="loginvendeur.php">Vendre |</a>
            <a class="link" href="#">Votre compte |</a>
            <a class="link" href="loginadmin.php">Admin |</a>
            <a class="link" href="#">Déconnexion</a>
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
