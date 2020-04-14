<?php

//Récupérer les données du formulaire
$adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$cp = isset($_POST["CP"]) ? $_POST["CP"] : "";
$pays = isset($_POST["Pays"]) ? $_POST["Pays"] : "";
$email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$telephone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";

//identification de la base de données
$database = "piscineweb";
//connection a à BDD
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button3"]){
    if($db_found){
        $sql = "SELECT * FROM coord";
        if($email != "") {
            $sql .= " WHERE Email LIKE '%$email%'";
            if($mdp != ""){
                $sql .= " AND Telephone LIKE '%$telephone%'";
                if($mdp != ""){
                $sql .= " AND Adresse LIKE '%$adresse%'";
                }
            }
        } 
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Ces coordonnées correspondent déjà à un compte vous avez surement fait une erreur !";
    header('Location:loginacheteur3.html');
    } 
    else{
    $sql = "INSERT INTO coord(Adresse, Ville, CP, Pays, Email, Telephone) VALUES('$adresse', '$ville', '$cp', '$pays', '$email', '$telephone')";
    $result = mysqli_query($db_handle, $sql);

    //vérification de la création de compte
    echo "Félicitations ! Vos coordonnées ont bien été enregistrées !";
    //diréction vers la prochaine page html (page d'accueil achats)
    header('Location:achat.html');
    }
    }

    
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>
