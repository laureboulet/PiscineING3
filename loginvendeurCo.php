<?php

//Récupérer les données du formulaire

$pseudo = isset($_POST["Pseudo"]) ? $_POST["Pseudo"] : "";
$mail = isset($_POST["Email"]) ? $_POST["Email"] : "";
$mdp = isset($_POST["Mdp"]) ? $_POST["Mdp"] : "";

//$mdp = password_hash($_POST["pass", PASSWORD_DEFAULT);

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button1"]){
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

        if (mysqli_num_rows($result)==0){
            echo "Créez-vous un compte d'abord !";
            
        }
        else{
            while($data = mysqli_fetch_assoc($result)){
                echo "Vous êtes connecté !";
                header('Location: accueilvendeur.html');
                exit();
            }
        }
            

    }
    
    else{
    echo "Database not found";
    }
}


mysqli_close($db_handle);
?>

