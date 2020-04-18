<?php
  session_start();
  $database = "piscineweb";
  //connectez-vous de votre BDD
  $db_handle = mysqli_connect('localhost', 'root', 'root'); 
  $db_found = mysqli_select_db($db_handle, $database);
  //$nomitem = isset($_POST["nomitem"])? $_POST["nomitem"] : "";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Achat</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
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
              <li class="nav-item"><a class="nav-link2" href="loginadmin.php"><strong>Admin</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="loginacheteur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li>
          </ul>
      </div>
  </nav>
  <!-- Page Content -->
  <div class="container" style="padding-top: 35px">
    <div class="row"> 
      <div class="col-lg-3">
        <div class="list-group" style="padding-top: 30px">
          <form method="post" action="achat.php" class="item">
              <input class="list-group-item" type="submit" name="enchere" value="Enchères">
              <input class="list-group-item" type="submit" name="offre" value="Meilleure offre">
              <input class="list-group-item" type="submit" name="immediat" value="Achat immédiat">
          </form>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9" style="padding-top: 30px">
        <div class="row">
        <?php
        if(isset($_POST['enchere'])){
          if ($db_found) {
            $sql = "SELECT * FROM item WHERE Typeachat LIKE 'Enchères' OR Typeachat LIKE 'Enchères et Achat immédiat'"; 
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
                  <a href="apercu.php" class="nav-link3" style="font-size: 20px"> <?php echo $data['Nomitem']; ?></a><br>
                  <a href="#"class="nav-link3">Item <?php echo $data['Iditem']; ?></a>
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
        }
          ?>
          <?php
        if(isset($_POST['offre'])){
          if ($db_found) {
            $sql = "SELECT * FROM item WHERE Typeachat LIKE 'Meilleure offre' OR Typeachat LIKE 'Meilleure offre et Achat immédiat'"; 
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
                  <a href="apercu.php" class="nav-link3" style="font-size: 20px"> <?php echo $data['Nomitem']; ?></a><br>
                  <a href="#" class="nav-link3">Item <?php echo $data['Iditem']; ?></a>
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
        }
          ?>
          <?php
        if(isset($_POST['immediat'])){
          if ($db_found) {
            $sql = "SELECT * FROM item WHERE Typeachat LIKE 'Achat immédiat' OR Typeachat LIKE 'Meilleure offre et Achat immédiat' OR Typeachat LIKE 'Enchères et Achat immédiat'"; 
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
                  <a href="apercu.php" class="nav-link3" style="font-size: 20px"> <?php echo $data['Nomitem']; ?></a><br>
                  <a href="#" class="nav-link3">Item <?php echo $data['Iditem']; ?></a>
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
        }
        if(isset($_POST['achat'])){
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
                  <a href="apercu.php" class="nav-link3" style="font-size: 20px"> <?php echo $data['Nomitem']; ?></a><br>
                  <a href="#" class="nav-link3">Item <?php echo $data['Iditem']; ?></a>
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
            <a class="link" href="loginvendeur.php">Vendre |</a>
            <a class="link" href="votrecompte.php">Votre compte |</a>
            <a class="link" href="loginadmin.php">Admin |</a>
            <a class="link" href="loginacheteur.php">Déconnexion</a>
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
<?php
  mysqli_close($db_handle);
?>
