<?php

//Récupérer les données du formulaire
$nom = isset($_POST["monNom"]) ? $_POST["monNom"] : "";
$prenom = isset($_POST["monPrenom"]) ? $_POST["monPrenom"] : "";
$pseudo = isset($_POST["monPseudo"]) ? $_POST["monPseudo"] : "";
$mail = isset($_POST["monMail"]) ? $_POST["monMail"] : "";
$mdp = isset($_POST["passw"]) ? $_POST["passw"] : "";

//$mdp = password_hash($_POST["pass", PASSWORD_DEFAULT);

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button2"]){
    if($db_found){
        $sql = "SELECT * FROM vendeur";
        if($pseudo != "") {
            $sql .= " WHERE Pseudo LIKE '%$pseudo%'";
            if($mail != ""){
                $sql .= " AND Email LIKE '%$mail%'";
                if($mdp != ""){
                    $sql .= " AND Mdp LIKE '%$mdp%'";
                }
            }
        }
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Vous avez déjà crée un compte. Connectez-vous directement sur notre site !";
    }
    else{
        $sql = "INSERT INTO vendeur(Nom, Prenom, Pseudo, Email, Mdp) VALUES('$nom', '$prenom', '$pseudo', '$mail', '$mdp')";
    $result = mysqli_query($db_handle, $sql);

    echo "Félicitations ! Votre compte a été crée !";

    }

    }
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);
?>


