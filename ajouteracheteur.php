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

    echo "Félicitations ! Votre compte a été crée !";
    header('Location:loginacheteur3.php');

    }

    }
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>