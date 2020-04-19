<?php
session_start();
	//Récupérer les données du formulaire
$Photofond = isset($_FILES["Photofond"]) ? $_FILES["Photofond"] : "";
$Photoprofil = isset($_FILES["Photoprofil"]) ? $_FILES["Photoprofil"] : "";

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
$Photofond = $_FILES['Photofond']['name'];
$Photoprofil = $_FILES['Photoprofil']['name'];

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

            $sql = "UPDATE vendeur SET Photofond = '$Photofond' WHERE Pseudovend ='" .$_SESSION['Pseudovend']. "'";
            $result = mysqli_query($db_handle, $sql);
            $sql = "SELECT * FROM vendeur";
                if(isset($Pseudovend)) {
                    $sql .= "WHERE Pseudovend LIKE '%$Pseudovend%'";
                }
            $result = mysqli_query($db_handle, $sql);
            //while ($data = mysqli_fetch_assoc($result)) {
                //$fond=$result['$Photofond'];
                echo 'Photo modifiée par ';
                echo $_SESSION['Pseudovend'];
                echo "<img src='$Photofond'>";
                //header('Location:accueilvendeur.php');
        }
    }
    else{
        echo 'Database not found';
    }
}
if($_POST["Photoprofil"]){
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

            $sql = "UPDATE vendeur SET Photoprofil = '$Photoprofil' WHERE Pseudovend ='" .$_SESSION['Pseudovend']. "'";
            $result = mysqli_query($db_handle, $sql);
            $sql = "SELECT * FROM vendeur";
                if(isset($Pseudovend)) {
                    $sql .= "WHERE Pseudovend LIKE '%$Pseudovend%'";
                }
            $result = mysqli_query($db_handle, $sql);
            //while ($data = mysqli_fetch_assoc($result)) {
                //$fond=$result['$Photofond'];
                echo 'Photo modifiée par ';
                echo $_SESSION['Pseudovend'];echo"<br>";
                echo "<img src='$Photoprofil'>";
                //header('Location:accueilvendeur.php');
        }
    }
    else{
        echo 'Database not found';
    }
}
mysqli_close($db_handle);

?>
