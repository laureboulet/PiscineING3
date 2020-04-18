

<?php

//Récupérer les données du formulaire
$nomtit = isset($_POST["Nomtitulaire"]) ? $_POST["Nomtitulaire"] : "";
$dateexp = isset($_POST["Date_expiration"]) ? $_POST["Date_expiration"] : "";
$numerocb = isset($_POST["Numero"]) ? $_POST["Numero"] : "";
$crypto = isset($_POST["Cryptogramme"]) ? $_POST["Cryptogramme"] : "";
$typecb = isset($_POST["Type"]) ? $_POST["Type"] : "";

//identification de la base de données
$database = "piscineweb";
//connection a à BDD
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);


if(isset($_POST["button5"])){ 
    if($db_found){
        
    
    
   
    // Démarage d'une session
    session_start();
    //on rempli la session avec ls informations
    $_SESSION['nomtitulaire']=$nomtit;
    $_SESSION['date_expiration']=$dateexp;
    $_SESSION['numerocb']=$numerocb;
    $_SESSION['crypto']=$crypto;
    $_SESSION['typecb']=$typecb;
   

    $etranger = $_SESSION['idach']; 

    $solde= rand (100,10000);

     $sql = "UPDATE carte SET Numero='$numerocb' , Date_expiration='$dateexp', Cryptogramme=$crypto , Nomtitulaire='$nomtit' ,Solde=$solde , Type='$typecb' WHERE Ach=$etranger";

    $result = mysqli_query($db_handle, $sql);

/*if ($result){echo"rempli";}
else{echo"vide";
echo mysqli_error($db_handle);} */

    //vérification de la création de compte
    echo "Félicitations ! Vos coordonnées ont bien été enregistrées !";
    //diréction vers la prochaine page html 
    header('Location:votrecompte.php');
    }
    

    
    else{
    echo "Database not found";
    }
}
mysqli_close($db_handle);

?>

