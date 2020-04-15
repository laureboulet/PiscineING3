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

                echo "Vous êtes connecté !" ;
                header('Location:achat.php');
            }
        }
            

    }
    
    else{
    echo "Database not found";
    }
}


mysqli_close($db_handle);
?>