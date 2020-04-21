<?php
  session_start();
  $database = "piscineweb";
  //connectez-vous de votre BDD
  $db_handle = mysqli_connect('localhost', 'root', 'root'); 
  $db_found = mysqli_select_db($db_handle, $database);
   $iditem=$_GET["iditem"];
 $idach = $_SESSION['idach'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Offre zoom</title>
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



  <!-- Page Content -->
  <div class="container" style="padding-top: 120px">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4 ">Ebay ECE</h1>
        <div class="list-group">
          <!--<a href="apercu.php?id=<?php echo $iditem?>&hello=true" class="list-group-item ">Ajouter l'article à mon panier</a> -->
          <a href="javascript:history.go(-1)" class="list-group-item">Revenir au panier</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <?php 
          $offremax=5;
         
            
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
            <h3 class="card-title"><?php echo $stack['Nomitem']; ?> </h3><br>
            <p class="card-text"><?php echo $stack['Description']; ?></p><br><br>

            <!-- On regarde si les offres ont déjà commencé pour cet acheteur concernant cet article -->
            <?php 

            $sql2="SELECT Derniereoffre FROM offre WHERE Itemoffre = $iditem AND Ach = $idach";
                    $result2=mysqli_query($db_handle,$sql2);  // en rentrant dans cette boucle on sait que les offres ont déjà commencé
                    $dern=mysqli_fetch_row($result2);
                    $json =  @json_encode('test');
            print "<script>console.log($json);</script>";
              if(!is_null($dern)){ // en rentrant dans cette boucle on sait que les offres ont déjà commencé
                $json =  @json_encode('aie');
            print "<script>console.log($json);</script>";
                    $vend='Vend';

              if(strcmp($dern[0], $vend)===0){ // on vérifie que la dernière offre ait bien été effectuée par le vendeu
                $json =  @json_encode('oulouo');
            print "<script>console.log($json);</script>";
                $sql3="SELECT Numoffre, Offrevend FROM offre WHERE Itemoffre = $iditem AND Ach = $idach";
                $result3=mysqli_query($db_handle,$sql3);
                while($row = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {

                $numoff = ($row);      
                }      
                $json =  @json_encode($numoff);
            print "<script>console.log($json);</script>";
                ?>
                <h4> Le vendeur vous a fait une offre :<?php echo $numoff['Offrevend'] ?>€</h4><br>    
                <?php
                if($numoff["Numoffre"]==$offremax){ ?>
                  <p style="font-size:25px; text-align:center;">Vous avez épuisé votre dernière offre, acceptez celle-ci ou l'article disparaitra de votre panier !</p>


                  <form method="POST">
                        <button type="submit" name="button9" class="btn btn-primary">Accepter l'offre</button>
                  </form>




                <?php  if(isset($_Post["button9"])){ // accepte l'offre on effectue la transaction et on supprimme l'item

                $json =  @json_encode("zaezae");
                  print "<script>console.log($json);</script>";
                      $offrevend=$numoff['Offrevend'];
                      $numcb=$_SESSION['numerocb'];
                      $solde=$_SESSION['solde'];
                      $nomtitulaire=$_SESSION['nomtitulaire'];

                  $sql="UPDATE item SET Prixitem = $offrevend";

                   $sql= "SELECT Prixitem FROM item WHERE Iditem = $iditem";
                  $result=mysqli_query($db_handle, $sql);
                           

                          $row=mysqli_fetch_array($result);
                          $prixitem = $row['Prixitem']; 

                    if($solde < $prixitem){
                      echo "<script>alert(\"Désolé votre solde est insuffisant pour acheter cet article. Veuillez changer de carte et réessayez !\")</script>";
                    }

                    else{
                    $sql = "INSERT INTO transaction (Mode, Achtrans, Cartetrans) VALUES ('Meilleure offre', $idach, '$numcb')";
                    $result = mysqli_query($db_handle,$sql);



                    $newSolde = $solde - $prixitem;

                    $sql = "UPDATE carte SET Solde = $newSolde WHERE Nomtitulaire = '$nomtitulaire'";
                    $result = mysqli_query($db_handle, $sql);

                    echo "<script>alert(\"Merci d'avoir effectué cet achat sur EBAY ECE !<br>Nous vous enverrons un mail convernant les modalités d'envoi.\")</script>";

                      $sql="DELETE FROM offre";
                      $sql .= "WHERE Itemoffre = $iditem AND Ach = $idach";
                      $result=mysqli_query($db_handle,$sql);

                      $sql = "DELETE FROM panier";
                      $sql .= " WHERE Itempan = $iditem";
                      //$result = mysqli_query($db_handle, $sql); 
                      $result = mysqli_query($db_handle, $sql);
                      
                      $sql = "DELETE FROM item";
                      $sql .= " WHERE Iditem = $iditem";
                      //$result = mysqli_query($db_handle, $sql); 
                      $result = mysqli_query($db_handle, $sql);
                      header("Location:panier.php");
                    }
                   } ?>
                   <form method="post">
                  <button type="submit" name="button10" class="btn btn-primary">Refuser</button>
                </form>
                  <?php 

                  if(isset($_POST['button10'])){
                     $sql="DELETE FROM offre WHERE Itemoffre = $iditem AND Ach = $idach";
                      $result=mysqli_query($db_handle,$sql);

                      $sql = "DELETE FROM panier WHERE Itempan = $iditem";
                      //$result = mysqli_query($db_handle, $sql); 
                      $result = mysqli_query($db_handle, $sql);
                      echo "<script>alert(\"L'article a été supprimmé de votre panier !\")</script>";
                      header("Location:panier.php");
                  }


                  ?>
                      

          <?php }else{ ?>  <!-- On fait entrer la nouvelle offre -->

            
                  <form method="POST">
                        <button type="submit" name="button9" class="btn btn-primary">Accepter l'offre</button>
                  </form>

                <?php  
                if(isset($_POST["button9"])){
                 // accepte l'offre on effectue la transaction et on supprimme l'item
                    $json =  @json_encode("ouiiiiiii");
                    print "<script>console.log($json);</script>";

                      $offrevend=$numoff['Offrevend'];
                      $numcb=$_SESSION['numerocb'];
                      $solde=$_SESSION['solde'];
                      $nomtitulaire=$_SESSION['nomtitulaire'];

                  $sql="UPDATE item SET Prixitem = $offrevend WHERE Iditem = $iditem";
                  if($result=mysqli_query($db_handle,$sql)){
                    $json =  @json_encode("test 1");
                    print "<script>console.log($json);</script>";
                  }
                  else{
                    echo mysqli_error($db_handle);
                  }

                   $sql= "SELECT Prixitem FROM item WHERE Iditem = $iditem";
                  if($result=mysqli_query($db_handle,$sql)){
                    $json =  @json_encode("test 2");
                    print "<script>console.log($json);</script>";
                  }
                  else{
                    echo mysqli_error($db_handle);
                  }

                      
                    $row=mysqli_fetch_array($result);
                    $prixitem = $row['Prixitem'];

                    if($solde < $prixitem){
                      echo "<script>alert(\"Désolé votre solde est insuffisant pour acheter cet article. Veuillez changer de carte et réessayez !\")</script>";
                    }

                    else{
                    $sql = "INSERT INTO transaction (Mode, Achtrans, Cartetrans) VALUES ('Meilleure offre', $idach, '$numcb')";
                    if($result = mysqli_query($db_handle,$sql)){
                      $json =  @json_encode("test 3");
                    print "<script>console.log($json);</script>";
                    }else{
                      echo mysqli_error($db_handle);
                    }



                    $newSolde = $solde - $prixitem;
                    $_SESSION['solde']=$newSolde;

                    $sql = "UPDATE carte SET Solde = $newSolde WHERE Nomtitulaire = '$nomtitulaire'";
                    if($result = mysqli_query($db_handle,$sql)){
                      $json =  @json_encode("test 4");
                    print "<script>console.log($json);</script>";
                    }else{
                      echo mysqli_error($db_handle);
                    }

                    echo "<script>alert(\"Merci d'avoir effectué cet achat sur EBAY ECE !<br>Nous vous enverrons un mail convernant les modalités d'envoi.\")</script>";

                      $sql="DELETE FROM offre WHERE Itemoffre = $iditem AND Ach = $idach";
                      if($result = mysqli_query($db_handle,$sql)){
                      $json =  @json_encode("test 5");
                    print "<script>console.log($json);</script>";
                    }else{
                      echo mysqli_error($db_handle);
                    }

                      $sql = "DELETE FROM panier";
                      $sql .= " WHERE Itempan = $iditem";
                      //$result = mysqli_query($db_handle, $sql); 
                      if($result = mysqli_query($db_handle,$sql)){
                      $json =  @json_encode("test 6");
                    print "<script>console.log($json);</script>";
                    }else{
                      echo mysqli_error($db_handle);
                    }
                      
                      $sql = "DELETE FROM item";
                      $sql .= " WHERE Iditem = $iditem";
                      //$result = mysqli_query($db_handle, $sql); 
                     if($result = mysqli_query($db_handle,$sql)){
                      $json =  @json_encode("test 7");
                    print "<script>console.log($json);</script>";
                    }else{
                      echo mysqli_error($db_handle);
                    }

                    header("Location:panier.php");
                    }
                   } ?>

              <button  type="submit" class="btn " data-toggle="modal" data-target="#nouvelleoffre">Faire une nouvelle offre</button>

              <div class="modal fade" id="nouvelleoffre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Entrez le montant que vous souhaitez proposer au vendeur</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" >
                            <div class="modal-body">
                              <input type="number" name="Offreach" required="">Prix en €</inmput>
                              <input type="number" name="iditem" value="<?php echo $iditem; ?>" style="display: none;"></inmput>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="button8" class="btn btn-primary">Envoyer la proposition</button>
                            </div>
                          </form>
                          </div>
                        </div>
                      </div>

                  <?php  


                   if(isset($_Post["button8"])){ // on envoie la nouvelle offre
                     $offreach = $_POST["Offreach"];
                  $numo2=$numoff + 1;
                     $offrebase=$stack['Prixitem'];
                     $sql="UPDATE offre SET Offreach=$offreach, Numoffre=$numo2, Derniereoffre='Acheteur' WHERE Itemoffre = $iditem AND Ach=$idach";
                     $result5=mysqli_query($db_handle,$result5);
                     header("Location:panier.php");
                   } 

          }

              }else{ //la dernière offre a ete faite par l'acheteur
                echo "Attendez la réponse du vendeur concernant votre offre";
              }
           
           }else{ $json =  @json_encode('avant offre');
            print "<script>console.log($json);</script>";// les offres n'ont pas commencé
             ?> 
              <h4> Le prix actuel de cet article est de :<?php echo $stack['Prixitem'] ?>€</h4><br>
              <button  type="submit" class="btn " data-toggle="modal" data-target="#soumettreoffre">Soumettre une offre</button>

              <div class="modal fade" id="soumettreoffre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Entrez le montant que vous souhaitez proposer au vendeur</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="post" >
                            <div class="modal-body">
                              <input type="number" name="Offreach" required="">Prix en €</inmput>
                              <input type="number" name="iditem" value="<?php echo $iditem; ?>" style="display: none;"></inmput>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <button type="submit" name="button7" class="btn btn-primary">Envoyer la proposition</button>
                            </div>
                          </form>
                          </div>
                        </div> 
                      </div>

                  <?php 

                   

                  if(isset($_POST["button7"])){

                    $offrebase=(int)$stack['Prixitem'];
                    $offreach = $_POST["Offreach"];
                    $iditem = (int)$_POST["iditem"];

                    $sql="INSERT INTO offre(Itemoffre, Ach, Offreach, Offrevend, Numoffre, Derniereoffre) VALUES ($iditem, $idach, $offreach,$offrebase, 1, 'Acheteur' )";
                    if($result4=mysqli_query($db_handle,$sql)){
                      echo"c'est bon";
                    }else{

                    
                      echo mysqli_error($db_handle);
                    }
                    header("Location:panier.php");
                  }


                  
                }
            ?>
            

           
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
