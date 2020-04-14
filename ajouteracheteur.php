<?php

//Récupérer les données du formulaire
$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";
$email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$mdp = isset($_POST["Mdp"]) ? $_POST["Mdp"] : "";

//identification de la base de données
$database = "piscineweb";
//connection a à BDD
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button2"]){
    if($db_found){
        $sql = "SELECT * FROM acheteur";
        if($email != "") {
            $sql .= " WHERE Email LIKE '%$email%'";
            if($mdp != ""){
                $sql .= " AND Mdp LIKE '%$mdp%'";

            }
        }
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Vous avez déjà créé un compte. Connectez-vous directement sur notre site !";
    header('Location:loginacheteur3.html');
    }
    else{
        $sql = "INSERT INTO acheteur(Nom, Prenom, Email, Mdp) VALUES('$nom', '$prenom', '$email', '$mdp')";
    $result = mysqli_query($db_handle, $sql);

    echo "Félicitations ! Votre compte a été crée !";
    header('Location:loginacheteur3.html');

    }

    }
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>