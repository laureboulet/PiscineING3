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
       /* $sql = "SELECT * FROM coord";
        if($email != "") {
            $sql .= " WHERE Email LIKE '%$email%'";
            if($mdp != ""){
                $sql .= " AND Mdp LIKE '%$mdp%'";

            }
        } */
      //  $result = mysqli_query($db_handle, $sql);
   
   /* if (mysqli_num_rows($result) != 0){
    echo "Vous avez déjà créé un compte. Connectez-vous directement sur notre site !";
    header('Location:loginacheteur.html');
    } */
    //else{
    $sql = "INSERT INTO coord(Adresse, Ville, CP, Pays, Email, Telephone) VALUES('$adresse', '$ville', '$cp', '$pays', '$email', 'telephone')";
    $result = mysqli_query($db_handle, $sql);

    //vérification de la création de compte
    echo "Félicitations ! Vos coordonnées ont bien été enregistrées !";
    //diréction vers la prochaine page html (suite de création de compte)
    header('Location:achat.html');

    }

    
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>
