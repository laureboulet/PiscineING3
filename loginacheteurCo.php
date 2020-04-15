<?php

//Récupérer les données du formulaire

$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$mdp = isset($_POST["Mdp"]) ? $_POST["Mdp"] : "";


//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button1"]){
    if($db_found){
        $sql = "SELECT * FROM acheteur";
        if($nom != "") {
            $sql .= " WHERE Nom LIKE '%$nom%'";
            if($email != ""){
                $sql .= " AND Email LIKE '%$email%'";
                if($mdp != ""){
                    $sql .= " AND Mdp LIKE '%$mdp%'";
                }
            }
        }
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result)==0){
        	echo "<script>alert(\"Créez-vous un compte d'abord !\")</script>";
        	echo "<script>alert(\"Créez-vous un compte d'abord !\")</script>";
        	echo "<script>alert(\"Créez-vous un compte d'abord !\")</script>";
        	echo "<script>alert(\"Créez-vous un compte d'abord !\")</script>";
            header('Location:loginacheteur.html');

            
        }
        else{
            while($data = mysqli_fetch_assoc($result)){
                echo "Vous êtes connecté !" ;
                header('Location:achat.html');
            }
        }
            

    }
    
    else{
    echo "Database not found";
    }
}


mysqli_close($db_handle);
?>