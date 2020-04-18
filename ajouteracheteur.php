<?php

//Récupérer les données du formulaire
$nom = isset($_POST["Nomach"]) ? $_POST["Nomach"] : "";
$prenom = isset($_POST["Prenomach"]) ? $_POST["Prenomach"] : "";
$email = isset($_POST["Emailach"]) ? $_POST["Emailach"] : "";
$mdp = isset($_POST["Mdpach"]) ? $_POST["Mdpach"] : "";

//identification de la base de données
$database = "piscineweb";
//connection a à BDD
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button2"]){
    if($db_found){
        $sql = "SELECT * FROM acheteur";
        if($email != "") {
            $sql .= " WHERE Emailach LIKE '%$email%'";
            if($mdp != ""){
                $sql .= " AND Mdpach LIKE '%$mdp%'";

            }
        }
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Vous avez déjà créé un compte. Connectez-vous directement sur notre site !";
    header('Location:loginacheteur.php');
    }
    else{
        $sql = "INSERT INTO acheteur(Nomach, Prenomach, Emailach, Mdpach) VALUES('$nom', '$prenom', '$email', '$mdp')";
    $result = mysqli_query($db_handle, $sql);
    // Démarage d'une session
	session_start();
	//on récupère la clé primaire de acheteur à savoir l'email
	$_SESSION['emailach']=$email;
	$_SESSION['prenomach']=$prenom;
	$_SESSION['nomach']=$nom;
	$_SESSION['mdpach']=$mdp;
	//on récupère des informations de la table pour les stocker dans nnotre session

				//id
				$recupId="SELECT Idach FROM acheteur WHERE Emailach='$email' AND Mdpach = '$mdp'";
				$result2=mysqli_query($db_handle, $recupId);
				$row=mysqli_fetch_array($result2);
				$id=$row['Idach'];
				$_SESSION['idach']=$id;

	$_SESSION['nomtitulaire']='Vide';
    $_SESSION['date_expiration']='MM/AA';
    $_SESSION['numerocb']='1000000000000001';
    $_SESSION['crypto']=101;
    $_SESSION['typecb']='Typecb';

    $solde= rand(100,10000);

    $creation="INSERT INTO carte(Numero, Date_expiration, Cryptogramme, Nomtitulaire, Solde, Type, ACh) VALUES ('1000000000000001', 'MM/AA', 101, 'Vide', $solde, 'TypeCb', $id )";
    $result = mysqli_query($db_handle, $creation);

    $panier= "INSERT INTO panier (Achpan) VALUES ($id)";
    $result = mysqli_query($db_handle, $panier);
					

    echo "<script>alert(\"Félicitations ! Votre compte a été créé !\")</script>";
    header('Location:loginacheteur3.php');

    }

    }
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>