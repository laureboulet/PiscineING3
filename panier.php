<?php
session_start();
  $database = "piscineweb";
  //connectez-vous de votre BDD
  $db_handle = mysqli_connect('localhost', 'root', 'root'); 
  $db_found = mysqli_select_db($db_handle, $database);
  $numeroitem = isset($_POST["numeroitem"])? $_POST["numeroitem"] : "";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Panier</title>
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

  <div class="container" style="padding-top: 40px"> 
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group" style="padding-top: 30px">
          <form method="post" action="panier.php" class="item">
              <p>Quel article voulez-vous supprimer de votre panier ? <br>Veuillez-nous indiquer votre choix en écrivant son numéro d'item.</p>
              <input type="number" name="numeroitem">
              <input type="submit" name="enlever" value="Supprimer">
          </form>
        </div>
        <?php
          if($_POST["enlever"]){
            if($db_found){
              
              $sql = "SELECT * FROM panier";
              if ($numeroitem != "") {
                $sql .= " WHERE Itempan LIKE '%$numeroitem%'";
              }
              $result = mysqli_query($db_handle, $sql);
              
              if (mysqli_num_rows($result) == 0){
                echo "L'item n'est pas dans votre panier.";
              }
              else{
                $idach=$_SESSION['idach'];
                $sql = "DELETE FROM panier WHERE Achpan=$idach AND Itempan=$numeroitem";
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
      <div class="col-lg-9">
        
        <!--ENCHERES-->
        <div class="row"> 
          <?php
          if($db_found){ 
            $idach = $_SESSION['idach']; 
            $recupiditem = "SELECT Itempan FROM panier WHERE Achpan=$idach"; /**/
            if($result = mysqli_query($db_handle, $recupiditem)){
              $stack = array();
              while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                //$stack = ($row);
                if(is_null($row['Itempan'])){
                  $json =  @json_encode("null");
                  print "<script>console.log($json);</script>";
                }else{
                    $stack[] = ($row);
                }
              }
            }
            $json =  @json_encode($stack);
            print "<script>console.log($json);</script>";
            $type="Enchères";
            //$iditem=$stack['Itempan'];
            foreach ($stack as $it) {
              $iditem = $it['Itempan'];

              $sql = "SELECT * FROM item WHERE Iditem = $iditem AND Typeachat = '$type'";
            //$sql = "SELECT * FROM item WHERE Iditem LIKE $iditem AND Typeachat LIKE 'Enchères' OR Typeachat LIKE 'Enchères et Achat immédiat'";
            $result2 = mysqli_query($db_handle, $sql);
            if(mysqli_num_rows($result2)==0){
              echo "pas d'item à afficher";
            }
            else{
              //echo "il y a des items";
              while($data = mysqli_fetch_assoc($result2)){
                $recupAll="SELECT * FROM item WHERE  Iditem=$iditem";
                if($result3=mysqli_query($db_handle, $recupAll)){
                $stack = array();
                  while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
                      $stack = ($row);      
                  }    
                } 
                $_SESSION['nomitem']=$stack['Nomitem'];
                $_SESSION['prixitem']=$stack['Prixitem'];
                $_SESSION['description']=$stack['Description'];
                $_SESSION['categorie']=$stack['Categorie'];
                $_SESSION['photo1']=$stack['Photo1'];
                $_SESSION['typeachat']=$stack['Typeachat'];
                $image1 = $_SESSION['photo1'];
                $nomitem = $_SESSION['nomitem'];
                //$iditem = $_SESSION['iditem'];
                $prixitem = $_SESSION['prixitem'];
                $description = $_SESSION['description'];
                $categorie = $_SESSION['categorie'];
                $typeachat = $_SESSION['typeachat'];
                //echo "il y a des items";
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
                      <a href="panier.php?iditem=<?php echo $data['Iditem']; ?>&hello=true" class="list-group-item">Accéder à l'enchère</a>
                    </div>
                  </div><?php } ?>
                </div>
          <?php
          }}
          } //fin db_found
          else{
            echo "database not found";
          }
          ?>
        </div>

        <!--MEILLEURE OFFRE--> <!--comment rajouter meilleure offre et achat immédiat ?-->
        <div class="row">
          <?php
          if($db_found){ 
            $idach = $_SESSION['idach']; 
            $recupiditem = "SELECT Itempan FROM panier WHERE Achpan=$idach";
            if($result = mysqli_query($db_handle, $recupiditem)){
              $stack = array();
              while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                if(is_null($row['Itempan'])){
                    $json =  @json_encode("null");
                    print "<script>console.log($json);</script>";
                }else{
                      $stack[] = ($row);
                }
                //$stack = ($row);
              }
            }
            $json =  @json_encode($stack);
            print "<script>console.log($json);</script>";
            $type="Meilleure offre";

            //$iditem=$stack['Itempan'];

            //$sql = "SELECT * FROM item WHERE Iditem LIKE $iditem AND Typeachat LIKE 'Meilleure offre' OR Typeachat LIKE 'Meilleure offre et Achat immédiat'";
            foreach ($stack as $it) {
              $iditem = $it['Itempan'];

              $sql = "SELECT * FROM item WHERE Iditem = $iditem AND Typeachat = '$type'";
            $result2 = mysqli_query($db_handle, $sql);
            if(mysqli_num_rows($result2)==0){
              echo "pas d'item à afficher";
            }
            else{
              //echo "il y a des items";
              while($data = mysqli_fetch_assoc($result2)){
                $recupAll="SELECT * FROM item WHERE  Iditem=$iditem";
                if($result3=mysqli_query($db_handle, $recupAll)){
                $stack = array();
                  while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
                      $stack = ($row);      
                  }    
                } 
                $_SESSION['nomitem']=$stack['Nomitem'];
                $_SESSION['prixitem']=$stack['Prixitem'];
                $_SESSION['description']=$stack['Description'];
                $_SESSION['categorie']=$stack['Categorie'];
                $_SESSION['photo1']=$stack['Photo1'];
                $_SESSION['typeachat']=$stack['Typeachat'];
                $image1 = $_SESSION['photo1'];
                $nomitem = $_SESSION['nomitem'];
                //$iditem = $_SESSION['iditem'];
                $prixitem = $_SESSION['prixitem'];
                $description = $_SESSION['description'];
                $categorie = $_SESSION['categorie'];
                $typeachat = $_SESSION['typeachat'];
                //echo "il y a des items";col
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <?php $image = $data['Photo1']; ?>
                    <a href="#"><?php echo "<img class='card-img-top' src='$image'>"; ?></a>
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="apercuoffre.php?id=<?php echo $data['Iditem']?>" class="nav-link3" style="font-size: 20px"> <?php echo $data['Nomitem']; ?></a><br> 
                        <a href="#"class="nav-link3">Item <?php echo $data['Iditem']; ?></a>
                      </h4>
                      <h5><?php echo $data['Prixitem'];?>€</h5>
                      <p class="card-text"><?php echo $data['Description']; ?></p>
                    </div>
                    <div class="card-footer">
                      <?php echo $data['Categorie'];?><br>
                      <small class="text-muted"><?php echo $data['Typeachat'];?></small>
                      <a href="apercuoffre.php?id=<?php echo $data['Iditem']?>" class="list-group-item">Voir les offres</a>
                    </div>
                  </div><?php } ?>
                </div>
          <?php
          }}
          } //fin db_found
          else{
            echo "database not found";
          }
          ?>
        </div>

        <!--ACHAT IMMEDIAT-->
        <div class="row">
            <?php
            if($db_found){ 
            $idach = $_SESSION['idach']; 
            $recupiditem = "SELECT Itempan FROM panier WHERE Achpan=$idach";
            if($result = mysqli_query($db_handle, $recupiditem)){
              $stack = array();
              while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                //$stack = ($row);
                if(is_null($row['Itempan'])){
                  $json =  @json_encode("null");
                  print "<script>console.log($json);</script>";
                }else{
                  $stack[] = ($row);
                }
              }
            }
            //$iditem=$stack['Itempan'];
            $json =  @json_encode($stack);
            print "<script>console.log($json);</script>";
            $type="Achat immédiat";

            foreach ($stack as $it) {
                $iditem = $it['Itempan'];

              $sql = "SELECT * FROM item WHERE Iditem = $iditem AND Typeachat = '$type'";
            //$sql = "SELECT * FROM item WHERE Iditem LIKE $iditem AND Typeachat LIKE 'Achat immédiat' OR Typeachat LIKE 'Meilleure offre et Achat immédiat' OR Typeachat LIKE 'Enchères et Achat immédiat'";
            $result2 = mysqli_query($db_handle, $sql);
            if(mysqli_num_rows($result2)==0){
              echo "pas d'item à afficher";
            }
            else{
              //echo "il y a des items";
              while($data = mysqli_fetch_assoc($result2)){
                $recupAll="SELECT * FROM item WHERE  Iditem=$iditem";
                if($result3=mysqli_query($db_handle, $recupAll)){
                $stack = array();
                  while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
                      $stack = (
                          $row
                      );      
                  }    
                } 
                $_SESSION['nomitem']=$stack['Nomitem'];
                $_SESSION['prixitem']=$stack['Prixitem'];
                $_SESSION['description']=$stack['Description'];
                $_SESSION['categorie']=$stack['Categorie'];
                $_SESSION['photo1']=$stack['Photo1'];
                $_SESSION['typeachat']=$stack['Typeachat'];
                $photoitem = $_SESSION['photo1'];
                $nomitem = $_SESSION['nomitem'];
                //$iditem = $_SESSION['iditem'];
                $prixitem = $_SESSION['prixitem'];
                $description = $_SESSION['description'];
                $categorie = $_SESSION['categorie'];
                $typeachat = $_SESSION['typeachat'];
                //echo "il y a des items"; 
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <?php $image = $data['Photo1']; ?>
                    <?php echo "<img class='card-img-top' src='$image'>"; ?>
                    <div class="card-body">
                      <h4 class="card-title">
                        <p style="font-size: 20px; color:#7EC6A3"> <?php echo $data['Nomitem']; ?></p>
                        <p style="font-size: 15px; color:#7EC6A3">Item <?php echo $data['Iditem']; ?></p>
                      </h4>
                      <h5><?php echo $data['Prixitem'];?>€</h5>
                      <p class="card-text"><?php echo $data['Description']; ?></p>
                    </div>
                    <div class="card-footer">
                      <?php echo $data['Categorie'];?><br>
                      <small class="text-muted"><?php echo $data['Typeachat'];?></small>
                      <a href="panier.php?iditem=<?php echo $data['Iditem']; ?>&hello=true" class="list-group-item">Payer</a>
                    </div>
                  </div><?php } ?>
                </div>
            <?php
              }}
            $idach=$_SESSION['idach'];
            $iditem=$_GET['iditem'];
            //$solde=$_SESSION['solde'];
            //$nomtitulaire=$_SESSION['nomtitulaire'];
            //$numcb=$_SESSION['numerocb'];

          //BLINDAGE POUR PAYER
          function payerItem($idach){
          $database = "piscineweb";
          //connectez-vous de votre BDD
          $db_handle = mysqli_connect('localhost', 'root', 'root'); 
          $db_found = mysqli_select_db($db_handle, $database);

          $iditem=$_GET['iditem'];
          $solde=$_SESSION['solde']; /*mettre ici et pas avant la fonction*/
          $numcb=$_SESSION['numerocb']; /*mettre ici et pas avant la fonction*/
          $nomtitulaire=$_SESSION['nomtitulaire']; /*mettre ici et pas avant la fonction*/
            $sql= "SELECT Prixitem FROM item WHERE Iditem = $iditem";
            $result=mysqli_query($db_handle, $sql);
                    $row=mysqli_fetch_array($result);
                    $prixitem = $row['Prixitem'];
                    
            if($solde < $prixitem){
              echo "<script>alert(\"Désolé votre solde est insuffisant pour acheter cet article. Veuillez changer de carte et réessayez !\")</script>";
            }
            else{
            $sql = "INSERT INTO transaction (Mode, Achtrans, Cartetrans) VALUES ('Achat immédiat', $idach, '$numcb')";
            $result = mysqli_query($db_handle,$sql);

            $newSolde = $solde - $prixitem;

            $sql = "UPDATE carte SET Solde = $newSolde WHERE Nomtitulaire = '$nomtitulaire'";
            $result = mysqli_query($db_handle, $sql);

            //echo "<script>alert(\"Merci d'avoir effectué cet achat sur EBAY ECE !<br>Nous vous enverrons un mail convernant les modalités d'envoi.\")</script>";
    /*****************enlever le delete from panier car cascade dans panier itempan*/
              /*$sql = "DELETE FROM panier";
              $sql .= " WHERE Itempan = $iditem";
              //$result = mysqli_query($db_handle, $sql); 
              $result = mysqli_query($db_handle, $sql);*/
              
              $sql = "DELETE FROM item";
              $sql .= " WHERE Iditem = $iditem";
              //$result = mysqli_query($db_handle, $sql); 
              $result = mysqli_query($db_handle, $sql);
            }
          }

          if(isset($_GET['hello'])){
            payerItem($idach);
          } 
          
          }//fin db_found
          else{
            echo "database not found";
          }
          ?>
        </div>
        <!-- /.row-->
      </div>
      <!--/.col-lg-9-->
    </div>
    <!--/.row-->
  </div>
  <!--container-->

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