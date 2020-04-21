<?php

//Récupérer les données du formulaire
$adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$cp = isset($_POST["CP"]) ? $_POST["CP"] : "";
$pays = isset($_POST["Pays"]) ? $_POST["Pays"] : "";
$telephone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";
$nomlivr = isset($_POST["Nomlivr"]) ? $_POST["Nomlivr"] : "";
$prenomlivr = isset($_POST["Prenomlivr"]) ? $_POST["Prenomlivr"] : "";

//identification de la base de données
$database = "piscineweb";
//connection a à BDD
$db_handle = mysqli_connect('localhost', 'root', 'root' );
$db_found = mysqli_select_db($db_handle, $database);

if($_POST["button3"]){
    if($db_found){
        $sql = "SELECT * FROM coord";
        if($telephone != ""){
            $sql .= " AND Telephone LIKE '%$telephone%'";
            if($adresse != ""){
            $sql .= " AND Adresse LIKE '%$adresse%'";
            }
        }
        $result = mysqli_query($db_handle, $sql);
   
    if (mysqli_num_rows($result) != 0){
    echo "Ces coordonnées correspondent déjà à un compte vous avez surement fait une erreur !";
    header('Location:loginacheteur3.php');
    } 
    else{
    
   
    // Démarage d'une session
    session_start();
    //on récupère la clé primaire de acheteur à savoir l'email
    $_SESSION['adresseach']=$adresse;
    $_SESSION['villeach']=$ville;
    $_SESSION['cpach']=$cp;
    $_SESSION['paysach']=$pays;
    $_SESSION['telephoneach']=$telephone;
    $_SESSION['nomlivr']=$nomlivr;
    $_SESSION['prenomlivr']=$prenomlivr;

    $etranger = $_SESSION['idach'];

    $sql = "INSERT INTO coord(Adresse, Ville, CP, Pays, Telephone, Nomlivr, Prenomlivr,Ach) VALUES('$adresse', '$ville', $cp, '$pays', $telephone, '$nomlivr', '$prenomlivr', $etranger)";

    if($result = mysqli_query($db_handle, $sql)){
        echo "c'est bon";
    }
    else{
        echo mysqli_error($db_handle);
    }


    //vérification de la création de compte
    echo "Félicitations ! Vos coordonnées ont bien été enregistrées !";
    //diréction vers la prochaine page html (page d'accueil achats)
    header('Location:votrecompte.php');
    }
    }

    
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>
