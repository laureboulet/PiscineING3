<?php

//Récupérer les données du formulaire

$nom = isset($_POST["Nomach"]) ? $_POST["Nomach"] : "";
$email = isset($_POST["Emailach"]) ? $_POST["Emailach"] : "";
$mdp = isset($_POST["Mdpach"]) ? $_POST["Mdpach"] : "";


//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button1"]){
    if($db_found){
        $sql = "SELECT * FROM acheteur";
        if($nom != "") {
            $sql .= " WHERE Nomach LIKE '%$nom%'";
            if($email != ""){
                $sql .= " AND Emailach LIKE '%$email%'";
                if($mdp != ""){
                    $sql .= " AND Mdpach LIKE '%$mdp%'";
                }
            }
        }
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result)==0){
        	echo "<script>alert(\"Créez-vous un compte d'abord !\")</script>";
            header('Location:loginacheteur.php');

            
        }
        else{
            while($data = mysqli_fetch_assoc($result)){
            	// Démarage d'une session
				session_start();
				//on récupère la clé primaire de acheteur à savoir l'email
				$_SESSION['emailach']=$email;
				$_SESSION['nomach']=$nom;
				$_SESSION['mdpach']=$mdp;
				//on récupère des informations de la table pour les stocker dans nnotre session
				

				//prénom
				$recupPre="SELECT Prenomach FROM acheteur WHERE Emailach='$email' AND Mdpach = '$mdp'";
				$result2=mysqli_query($db_handle, $recupPre);
				$row=mysqli_fetch_array($result2);
				$prenom=$row['Prenomach'];
				$_SESSION['prenomach']=$prenom;

				//id
				$recupId="SELECT Idach FROM acheteur WHERE Emailach='$email' AND Mdpach = '$mdp'";
				$result3=mysqli_query($db_handle, $recupId);
				$row=mysqli_fetch_array($result3);
				$id=$row['Idach'];
				$_SESSION['idach']=$id;


//on récupère les informations de la session correspondant à la personne qui vient de se connecter (ses coordonnées)


				//adresse
				$recupAd="SELECT Adresse FROM coord WHERE Ach=$id";
				$result5=mysqli_query($db_handle, $recupAd);
				$row=mysqli_fetch_array($result5);
				$adresseach=$row['Adresse'];
				$_SESSION['adresseach']=$adresseach; 
				

				//Ville
				$recupVille="SELECT Ville FROM coord WHERE Ach=$id";
				$result6=mysqli_query($db_handle, $recupVille);
				$row=mysqli_fetch_array($result6);
				$villeach=$row['Ville'];
				$_SESSION['villeach']=$villeach; 

				//Cp
				$recupCp="SELECT CP FROM coord WHERE Ach=$id";
				$result7=mysqli_query($db_handle, $recupCp);
				$row=mysqli_fetch_array($result7);
				$cp=$row['CP'];
				$_SESSION['cpach']=$cp; 

				//Pays
				$recupPays="SELECT Pays FROM coord WHERE Ach=$id";
				$result8=mysqli_query($db_handle, $recupPays);
				$row=mysqli_fetch_array($result8);
				$pays=$row['Pays'];
				$_SESSION['paysach']=$pays; 

				//Telephone
				$recupTel="SELECT Telephone FROM coord WHERE Ach=$id";
				$result9=mysqli_query($db_handle, $recupTel);
				$row=mysqli_fetch_array($result9);
				$telephone=$row['Telephone'];
				$_SESSION['telephoneach']=$telephone; 

				//Nomlivr
				$recupNomlivr="SELECT Nomlivr FROM coord WHERE Ach=$id";
				$result10=mysqli_query($db_handle, $recupNomlivr);
				$row=mysqli_fetch_array($result10);
				$nomlivr=$row['Nomlivr'];
				$_SESSION['nomlivr']=$nomlivr; 

				//Prenomlivr
				$recupPrelivr="SELECT Prenomlivr FROM coord WHERE Ach=$id";
				$result11=mysqli_query($db_handle, $recupPrelivr);
				$row=mysqli_fetch_array($result11);
				$prenomlivr=$row['Prenomlivr'];
				$_SESSION['prenomlivr']=$prenomlivr; 

// on récupère les données bancaires de la carte si elle existe 
				$carte="SELECT Numero FROM carte WHERE ACh=$id";
				$result = mysqli_query($db_handle, $carte);

       			 if (mysqli_num_rows($result)==0){
					$_SESSION['nomtitulaire']=NULL;
				    $_SESSION['date_expiration']=NULL;
				    $_SESSION['numerocb']=NULL;
				    $_SESSION['crypto']=NULL;
				    $_SESSION['typecb']=NULL;

				    $solde= rand(100,10000);

				    $creation="INSERT INTO carte (Numero, Date_expiration, Cryptogramme, Nomtitulaire, Solde, Type, ACh) VALUES (0000000000000000, 'MM/AA', 000, 'Nom', $solde, 'Type', $id ";


				}
				else{

					//Nomtitulaire
				$recupNomtit="SELECT Nomtitulaire FROM carte WHERE Ach=$id";
				$result12=mysqli_query($db_handle, $recupNomtit);
				$row=mysqli_fetch_array($result12);
				$nomtit=$row['Nomtitulaire'];
				$_SESSION['nomtitulaire']=$nomtit;

				$recupAll="SELECT * FROM carte WHERE  Ach=$id";
				if($result=mysqli_query($db_handle, $recupAll)){
                        $stack = array();
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                            $stack = (
                                $row
                            );      
                        }
       					$_SESSION['date_expiration']=$stack['Date_expiration'];
       					$_SESSION['numerocb']=$stack['Numero'];
       					$_SESSION['crypto']=$stack['Cryptogramme'];
       					$_SESSION['typecb']=$stack['Type'];
				}else{
					$json =  @json_encode("aille");
        			print "<script>console.log($json);</script>";
				}

			

				}

					$json =  @json_encode($_SESSION);
        			print "<script>console.log($json);</script>";

                echo "<script>alert(\"Vous êtes connectés !\")</script>";
               header('Location:votrecompte.php');
            }
        }
            

    }
    
    else{
    echo "Database not found";
    }
}


mysqli_close($db_handle);
?>