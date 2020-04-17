<?php

//Récupérer les données du formulaire
$Nomitem = isset($_POST["Nomitem"]) ? $_POST["Nomitem"] : "";
$Description = isset($_POST["Description"]) ? $_POST["Description"] : "";
$Photo1 = isset($_FILES["Photo1"]) ? $_FILES["Photo1"] : "";
$Categorie = isset($_POST["Categorie"]) ? $_POST["Categorie"] : "";
$Typeachat = isset($_POST["Typeachat"]) ? $_POST["Typeachat"] : "";
$Prixitem = isset($_POST["Prixitem"]) ? $_POST["Prixitem"] : "";


//$mdp = password_hash($_POST["pass", PASSWORD_DEFAULT);

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

$Photo1 = $_FILES['Photo1']['name'];

if($_POST["vendreItem"]){
    if($db_found){
        $sql = "SELECT * FROM item";

        if($Nomitem != "") {
            $sql .= " WHERE Nomitem LIKE '%$Nomitem%'";
            }
        $result = mysqli_query($db_handle, $sql);

    	if (mysqli_num_rows($result) != 0){
            echo("Vous avez déja ajouté cet item !");

            //$item = false;
            //header('Location:vendreItem.php');
    	}
   		else{
            session_start();
            $etranger = $_SESSION['Idvend'];
            $sql = "INSERT INTO item(Nomitem, Prixitem, Description, Categorie, Typeachat, Venditem, Photo1) VALUES('$Nomitem',$Prixitem,'$Description','$Categorie','$Typeachat', '$etranger','$Photo1')";
    	   $result = mysqli_query($db_handle, $sql);
     	//$item = true;
     	    echo "Item ajouté" ;
                $sql = "SELECT * FROM item";
                if($Nomitem != "") {
                    $sql .= " WHERE Nomitem LIKE '%$Nomitem%'";
                }
        $result = mysqli_query($db_handle, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $image=$data['Photo'];
        echo "<img src='$Photo1'>";

                    echo "Nom: " . $data['Nomitem'] . "<br>";
                    echo "Prix: " . $data['Prixitem'] . "<br>";
                    echo "Description: " . $data['Description'] . "<br>";
                    echo "Categorie: " . $data['Categorie'] . "<br>";
                    echo "Venditem: " . $data['Venditem'] . "<br>";
                    echo "Typeachat: " . $data['Typeachat'] . "<br>";
   	  	//header('Location:vendreItem.php');

    	}

	   }
       }
	else{
    	echo "Database not found";
    }
    
}
mysqli_close($db_handle);


?>
