<?php
  session_start();
  $database = "piscineweb";
  //connectez-vous de votre BDD
  $db_handle = mysqli_connect('localhost', 'root', 'root'); 
  $db_found = mysqli_select_db($db_handle, $database);
  $nomitem = isset($_POST["nomitem"])? $_POST["nomitem"] : "";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Supprimer des items par l'administrateur</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md fixed-top">
    <img src="logo.png" alt="Logo" width="130" height="100"/>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="main-navigation">
          <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="accueiladmin.html"><strong>Accueil</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="gereritem.php"><strong>Items en vente</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="gerervendeur.php"><strong>Vendeurs</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="decoadmin.php"><strong>Se déconnecter</strong></a></li>
          </ul>
      </div>
  </nav>
  <!-- Page Content -->
  <div class="container" style="padding-top: 35px">
    <div class="row"> 
      <div class="col-lg-3">
        <div class="list-group" style="padding-top: 30px">
          <a href="#" class="list-group-item">Ferraille ou Trésor</a>
          <a href="#" class="list-group-item">Bon pour le Musée</a>
          <a href="#" class="list-group-item">Accessoire VIP</a><br>
          <form method="post" action="supprimeritemadmin.php" class="item">
              <p>Quel article voulez-vous supprimer ? <br>Veuillez-nous indiquer votre choix en écrivant son nom</p>
              <input type="text" name="nomitem">
              <input type="submit" name="supprimer" value="Supprimer">
          </form>
        </div>
        <?php
          if($_POST["supprimer"]){
            if($db_found){
              $sql = "SELECT * FROM item";
              if ($nomitem != "") {
                $sql .= " WHERE Nomitem LIKE '%$nomitem%'";
              }
              $result = mysqli_query($db_handle, $sql);
              if (mysqli_num_rows($result) == 0){
                echo("L'item n'existe pas.");
              }
              else{
                while ($data = mysqli_fetch_assoc($result)) {
                  $iditem = $data['Iditem'];
                  //echo "<br>";
                }
                  $sql = "DELETE FROM item";
                  $sql .= " WHERE Iditem = $iditem";
                  $result = mysqli_query($db_handle, $sql); 
                  echo "Item supprimé. <br>";
              }
            }
            else{
              echo "Database not found";
            }
          }
        ?>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="ferraille.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="musee.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="vip.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="row">
        <?php
          if ($db_found) {
            $sql = "SELECT * FROM item"; 
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0) {
              echo "Pas d'item à vendre."; 
            } 
            else {
              while ($data = mysqli_fetch_assoc($result)) {                   
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php $image = $data['Photo1']; ?>
              <a href="#"><?php echo "<img class='card-img-top' src='$image'>"; ?></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"> <?php echo $data['Nomitem']; ?></a>
                  <a href="#">Item <?php echo $data['Iditem']; ?></a>
                </h4>
                <h5><?php echo $data['Prixitem'];?>€</h5>
                <p class="card-text"><?php echo $data['Description']; ?></p>
              </div>
              <div class="card-footer">
                <?php echo $data['Categorie'];?><br>
                <small class="text-muted"><?php echo $data['Typeachat'];?></small>
              </div>
            </div>
          </div>
          <?php  
              }
            }
          } 
          else {
            echo "Database not found";
          }
          ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Footer -->
  <footer class="page-footer text-center"> 
    <div id="nav">
            <a class="link" href="accueiladmin.html">Accueil |</a>
            <a class="link" href="gereritem.php">Items en vente |</a>
            <a class="link" href="gerervendeur.php">Vendeurs |</a>
            <a class="link" href="#">Enchères</a>
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
