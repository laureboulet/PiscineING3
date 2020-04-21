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
  <title>Supprimer des items par le vendeur</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="itemvendeur.css">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md fixed-top">
    <img src="logo.png" alt="Logo" width="130" height="100"/>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="main-navigation">
          <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="accueilvendeur.php"><strong>Accueil</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="afficheritems.php"><strong>Items en vente</strong></a></li>
              <li class="nav-item"><a class="nav-link" href="vendreItem.php"><strong>Vendre un item</strong></a></li>
              <li class="nav-item"><a class="nav-link2" href="loginvendeur.php"><img src="deconnexion.png" alt="Logo" width="25" height="25"/></a></li>
              <li class="nav-item-compte"><a class="nav-link-compte" href="#"><strong><?php echo $_SESSION['Pseudovend'];?></strong></a></li>
          </ul>
          <ul class="navbar-nav">

                    <?php 
                session_start();
                $profilvend = $_SESSION['photoprofil'];
                $fondvend = $_SESSION['photofond'];
                echo"<img src='$profilvend' id='profil' alt='Profil' width='100' height='100' border-radius='50'>";?>

            </ul>
      </div>
  </nav>
  <!-- Page Content -->
  <div class="container" style="padding-top: 100px;background-image: url(<?php '$fondvend' ?>);background-size: cover;
            background-position: center; position: relative;">
    <div class="row"> 
      <div class="col-lg-3">
        <div class="list-group" style="padding-top: 30px">
          <form method="post" action="afficheritems.php" class="item">
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
                  
                  $recupId = "SELECT Iditem FROM item WHERE Nomitem='$nomitem'";
                      session_start();
                      $result2 = mysqli_query($db_handle,$recupId);
                      
                      $row = mysqli_fetch_array($result2);
                      $iditem = $row['Iditem'];
                      $_SESSION['iditem']=$iditem;
                }
                  
                  $sql = "DELETE FROM item WHERE Iditem= $iditem";
                  
                  $result = mysqli_query($db_handle,$sql);
                  
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
        <div class="row">
        <?php
          if ($db_found) {
            $idvend = $_SESSION['idvend'];
            //echo $idvend;
            $sql = "SELECT * FROM item WHERE Venditem = $idvend";
            $result = mysqli_query($db_handle, $sql);
            $tab=array();
            if (mysqli_num_rows($result) == 0) {
              echo "Pas d'item à vendre."; 
            } 
            else {

              while ($data = mysqli_fetch_assoc($result)) {  
                
                $tab[]=($data);
                
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <?php $image = $data['Photo1']; ?>
              <?php echo "<img class='card-img-top' src='$image'>"; ?>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#" style="font-size: 20px; color:#7EC6A3"> <?php echo $data['Nomitem']; ?></a><br>
                  <a href="#" style="font-size: 15px; color:#7EC6A3">Item <?php $iditem=$data['Iditem']; echo $data['Iditem'];  ?></a>
                </h4>
                <h5><?php echo $data['Prixitem'];?>€</h5>
                <p class="card-text"><?php echo $data['Description']; ?></p>
              </div>
              <div class="card-footer">
                <?php echo $data['Categorie'];?><br>
                <small class="text-muted"><?php echo $data['Typeachat'];?></small><br>
                <!--Si le type d'achat contient meilleure offre-->
                <?php if($data['Typeachat']=="Meilleure offre" || $data['Typeachat']=="Meilleure offre et Achat immédiat"){ 
                  $requete = "SELECT * FROM offre WHERE Itemoffre='$iditem'"; 
           
                $result6=mysqli_query($db_handle,$requete);
            
                $stack = array();
                while($row = mysqli_fetch_array($result6,MYSQLI_ASSOC)) {
                    $stack = ($row);      
                }        
                  $offreach = $stack['Offreach'];
                  $derniereoffre = $stack['Derniereoffre'];
                  $itemoffre = $stack['Itemoffre'];
                  //$iditem=$_SESSION['iditem'];
                  //$iditem = $itemoffre;
                  $idach = $stack['Ach'];
                  echo "Offre de l'acheteur : "; echo $offreach; $json =  @json_encode($idach);
            print "<script>console.log($json);</script>";?>

                   <!--Formulaire qui permet d'accepter l'offre faite par l'acheteur ou refaire une nouvelle offre-->
                   <form action="afficheritems.php" method="post">
                    <input type="text" name="iditem" value="<?php echo $data['Iditem'];?>" style="display: none" >
                    <input type="text" name="idach" value="<?php echo $idach;?>" style="display: none" >
                      <input type="submit" name="Accepter" value="Accepter"><br>

                      <input type="number" name="Nouvelleoffre" placeholder="Nouvelleoffre">
                      <input type="submit" name="Envoyeroffre" value="Nouvelle offre">
                    </form> <?php } ?>
              </div>
            </div>
          </div>
          <?php  } 
                      //récupération info
                      //$_SESSION['Derniereoffre']= 'Acheteur';
                //$derniereoffre = $stack['Derniereoffre'];
                      //$_SESSION['Offreach']= '40';
                      //echo $iditem;
                      //$_SESSION['Itemoffre'] = 79;
                //$itemoffre = $stack['Itemoffre'];
                      //$iditem = $itemoffre;
                      //$_SESSION['Idach'] = 12;
                //$idach = $stack['Idach'];
                      //RÉCUPÉRATION DERNIERE OFFRE
                      /*$recupderniere = "SELECT Derniereoffre FROM offre WHERE Itemoffre LIKE $iditem";
                      $result = mysqli_query($db_handle,$recupderniere);
                      
                      $row = mysqli_fetch_array($result);
                      $derniereoffre = $row['Derniereoffre'];
                      $_SESSION['Derniereoffre']=$derniereoffre;*/
                      
                      //RÉCUPÉRATION offre achteur
                     /* $sql= "SELECT Offreach FROM offre WHERE Itemoffre = $itemoffre";
                      $result=mysqli_query($db_handle, $sql);
                      $row=mysqli_fetch_array($result);
                      $offreach = $row['Offreach'];*/


                      //RÉCUPÉRATION ID DE L'ACHETEUR
                     /* $recupidach= "SELECT Idach FROM acheteur WHERE Itemoffre LIKE $iditem";
                      $result = mysqli_query($db_handle,$recupderniere);
                      
                      $row = mysqli_fetch_array($result);
                      $idach = $row['Ach'];
                      $_SESSION['Ach']=$derniereoffre;*/
                      

                      $Nouvelleoffre = isset($_POST["Nouvelleoffre"]) ? $_POST["Nouvelleoffre"] : "";
                      //echo $iditem;
                      //Si la dernière offre vient de l'acheteur
                      if(strcmp($derniereoffre, 'Acheteur')==0){ 
                        $json =  @json_encode("test");
            print "<script>console.log($json);</script>";
                          //Si on appuie sur bouton nouvelle offre 
                          if(isset($_POST["Envoyeroffre"])){
                        echo $iditem;
                            //Mise à jour de l'offre vendeur
                            $sql = "UPDATE offre SET Offrevend =$Nouvelleoffre WHERE Itemoffre = $iditem";
                            $result = mysqli_query($db_handle, $sql);
                             
                            //Mise à jour du dernier a faire l'offre (en l'occurence vendeur)
                            $sql = "UPDATE offre SET Derniereoffre = 'Vend' WHERE Itemoffre = $iditem";
                            $result = mysqli_query($db_handle, $sql);
     
                
                          }
                          //Si on appuie sur bouton accepter 
                          if(isset($_POST["Accepter"])){

                            $iditem=$_POST['iditem'];
                            $idach=$_POST['idach'];


                            //$sql = "UPDATE item SET Typeachat = 'Achat immédiat' WHERE Iditem = $iditem";
                            //$result = mysqli_query($db_handle,$sql);
                            $sql = "SELECT Offreach FROM offre WHERE Ach=$idach";
                            $json =  @json_encode($idach);
            print "<script>console.log($json);</script>";
                            if($result = mysqli_query($db_handle,$sql)){
                              $json =  @json_encode("oui");
            print "<script>console.log($json);</script>";
                            }
                            else{
                              echo mysqli_error($db_handle);
                            }
                            $row=mysqli_fetch_row($result);
                            $offreach=$row[0];
                            $sql = "UPDATE item SET Prixitem = $offreach  WHERE Iditem = $iditem";
                            $result = mysqli_query($db_handle,$sql);

                        }
                      } 
                      else {
                        echo "<script>alert(\"Attendez la réponse de l'acheteur\")</script>";
                      }
                ?>
          <?php  
              
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
            <a class="link" href="accueilvendeur.php">Accueil |</a>
            <a class="link" href="gereritem.php">Items en vente |</a>
            <a class="link" href="vendreItem.php">Vendre un item |</a>
            <a class="link" href="decovendeur.php">Déconnexion</a>
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