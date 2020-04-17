<?php

//Récupérer les données du formulaire

$Pseudovend = isset($_POST["Pseudovend"]) ? $_POST["Pseudovend"] : "";
$mail = isset($_POST["Emailvend"]) ? $_POST["Emailvend"] : "";
$mdp = isset($_POST["Mdpvend"]) ? $_POST["Mdpvend"] : "";

//$mdp = password_hash($_POST["pass", PASSWORD_DEFAULT);

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);
$connection = false;

if($_POST["button1"]){
    if($db_found){
        $sql = "SELECT * FROM vendeur";
        if($Pseudovend != "") {
            $sql .= " WHERE Pseudovend LIKE '%$Pseudovend%'";
            if($mail != ""){
                $sql .= " AND Emailvend LIKE '%$mail%'";
                if($mdp != ""){
                    $sql .= " AND Mdpvend LIKE '%$mdp%'";
                }
            }
        }
        $result = mysqli_query($db_handle, $sql);

        if (mysqli_num_rows($result)==0){
            echo "Créez-vous un compte d'abord !";
            header('Location: loginvendeur.php');
            
        }
        else{
            while($data = mysqli_fetch_assoc($result)){
                

                // Démarage d'une session
                session_start();
                //on récupère la clé primaire de vendeur à savoir pseudo
                $recupId = "SELECT Idvend FROM vendeur WHERE Emailvend='$mail' AND Mdpvend='$mdp'";
                $result2 = mysqli_query($db_handle,$recupId);
                $row = mysqli_fetch_array($result2);
                $id = $row['Idvend'];
                $_SESSION['Idvend']=$id;
                //echo "Vous êtes connecté !";

                header('Location:accueilvendeur.php');
                exit();
            }
        }
    }
}
            
else{
    echo "Database not found";
    }


mysqli_close($db_handle);
?>

