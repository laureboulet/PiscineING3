<?php
session_start();
$Photofond = isset($_POST["Photofond"]) ? $_POST["Photofond"] : "";
$Photoprofil = isset($_POST["Photoprofil"]) ? $_POST["Photoprofil"] : "";
//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
?>
<?php
    if($_POST["fond"]){
    if($db_found){
        $sql = "SELECT * FROM vendeur";
        if($Photofond != "") {
            $sql .= "WHERE Photofond LIKE '%$Photofond'";
        }
        $result = mysqli_query($db_handle,$sql);

        session_start();
        $_SESSION['photofond']=$Photofond;
            $vendeur = $_SESSION['idvend'];
            $sql = "UPDATE vendeur SET Photofond='$Photofond' WHERE Idvend =$vendeur";
            $result = mysqli_query($db_handle, $sql);
    }
    else{
        echo 'Database not found';
    }
}
if($_POST["profil"]){
    if($db_found){
        $sql = "SELECT * FROM vendeur";
        if($Photoprofil != "") {
            $sql .= "WHERE Photoprofil LIKE '%$Photoprofil'";
        }
        $result = mysqli_query($db_handle,$sql);

            session_start();
            $_SESSION['photoprofil']=$Photoprofil;
            $vendeur = $_SESSION['idvend'];
            $sql = "UPDATE vendeur SET Photoprofil = '$Photoprofil' WHERE Idvend =$vendeur";
            $result = mysqli_query($db_handle, $sql);
    }
    else{
        echo 'Database not found';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil Vendeur</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="itemvendeur.css">
    <script type="text/javascript">
        $(document).ready(function()
        { $('.header').height($(window).height());
        });
    </script>
</head>

<body>
<!--Barre de navigation/menu-->
	<nav class="navbar navbar-expand-md">
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
                $pseudovendeur=$_SESSION['pseudovend'];
                echo"<img src='$profilvend' id='profil' alt='Profil' width='100' height='100' border-radius='50'>";?>
            </ul>
        </div>		
	</nav>

	<header class="page-header header container-fluid" style="background-image: url(new.png);background-size: cover;
            background-position: center; position: relative;">
         	<div class="description">
                <h1 align="center"><?php echo "Bienvenue sur votre page vendeur "; echo $pseudovendeur; echo "!";?></h1>
                <p align="center">
                Vous pouvez ajouter et supprimer des items à vendre ou suivre les ventes de vos items en temps réel !
               </p><br><br><br>

            </div>

            <div class="row">
        		<div class="col-lg-6 col-md-6 col-sm-12 accueilvend" align="center">
        			<h3 class="fondecran">Choisissez votre fond d'écran</h3>
        			<form action="accueilvendeur.php" method="post" enctype="multipart/form-data">
        				
        				<input type="text" name="Photofond" ><br>
                        <input type="submit" class="imagefile" name="fond" value="Choisir un fond">
        			</form>

        		</div>

        		<div class="col-lg-6 col-md-6 col-sm-12 accueilvend" align="center">
        			<h3 class="fondecran">Importez votre photo de profil</h3>
        			<form action="accueilvendeur.php" method="post" enctype="multipart/form-data">
        				<input type="text" name="Photoprofil"><br>
                        <input type="submit" class="imagefile" name="profil" value="Choisir une photo">
        			</form>
        		</div>
        	</div>

    </header>
    <footer class="page-footer text-center"> 
        <div id="nav">
            <a class="link" href="accueilvendeur.php">Accueil | </a>
            <a class="link" href="afficheritems.php"> Items en vente | </a>
            <a class="link" href="vendreItem.php"> Vendre un item |</a>
            <a class="link" href="decovendeur.php"> Déconnexion </a>
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