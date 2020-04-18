<?php

session_start();

	//Récupérer les données du formulaire
$Photofond = isset($_FILES["Photofond"]) ? $_FILES["Photofond"] : "";

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
$Photofond = $_FILES['Photofond']['name'];
var_dump($_FILES);
if($_POST["Photofond"]){
    if($db_found){
        $sql = "SELECT * FROM vendeur";
        if(isset($Pseudovend)) {
            $sql .= "WHERE Pseudovend LIKE '%$Pseudovend'";
        }
        $result = mysqli_query($db_handle,$sql);

        if(mysqli_num_rows($result)==0)
        {
            echo 'Erreur';
            //$_SESSION['Pseudovend']=$Pseudovend;
            //header('Location:accueilvendeur.php');
        }
        else{

            $sql = "UPDATE vendeur SET Photofond = '$Photofond' WHERE Pseudovend ='".isset($Pseudovend)."'";
            $result = mysqli_query($db_handle, $sql);
            $sql = "SELECT * FROM vendeur";
                if(isset($Pseudovend)) {
                    $sql .= "WHERE Pseudovend LIKE '%$Pseudovend%'";
                }
            $result = mysqli_query($db_handle, $sql);
            //while ($data = mysqli_fetch_assoc($result)) {
                //$fond=$result['$Photofond'];
                echo "<img src='$Photofond'>";
                       
            
        }
    }
    else{
        echo 'Database not found';
    }
}
mysqli_close($db_handle);

?>
