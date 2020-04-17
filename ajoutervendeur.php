<?php

//Récupérer les données du formulaire
$nom = isset($_POST["Nomvend"]) ? $_POST["Nomvend"] : "";
$pseudo = isset($_POST["Pseudovend"]) ? $_POST["Pseudovend"] : "";
$mail = isset($_POST["Emailvend"]) ? $_POST["Emailvend"] : "";
$mdp = isset($_POST["Mdpvend"]) ? $_POST["Mdpvend"] : "";

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
            $sql .= " WHERE Pseudovend LIKE '%$pseudo%'";
            if($mail != ""){
                $sql .= " AND Emailvend LIKE '%$mail%'";
                if($mdp != ""){
                    $sql .= " AND Mdpvend LIKE '%$mdp%'";
                }
            }
        }
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Vous avez déjà crée un compte. Connectez-vous directement sur notre site !";
    }
    else{
        $sql = "INSERT INTO vendeur(Nomvend, Pseudovend, Emailvend, Mdpvend) VALUES('$nom', '$pseudo', '$mail', '$mdp')";
        $result = mysqli_query($db_handle, $sql);

    echo "Félicitations ! Votre compte a été crée ! Revenez en arrière pour vous connecter";

    }

    }
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);
?>


