<?php

//Identification de la BDD
$database = "piscineweb";
//Connexion à la BDD
$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);


if($_POST["vendreItem2"]){
    if($db_found){
        $sql = "SELECT * FROM item";
        if ($Nomitem != "") {
			$sql = " WHERE Nomitem LIKE '%$Nomitem%'";
		}
        $result = mysqli_query($db_handle, $sql);

    	if (mysqli_num_rows($result) == 0){
            echo("L'item a déja été supprimé");

            //$item = false;
            //header('Location:vendreItem.php');
    	}
   		else{
            //session_start();
            //$etranger = $_SESSION['Idvend'];
            while ($data = mysqli_fetch_assoc($result)) {
            	$Nomitem=$data['Nomitem'];
            	}
            $sql = "DELETE FROM item" 
            $sql .= "WHERE Nomitem= $Nomitem";
            $result = mysqli_query($db_handle, $sql);

     	//$item = true;
     	    //echo "Item supprimé" ;
   	  		header('Location:afficheritems.php');


	   }
	  }

	else{
    	echo "Database not found";
    }
    
}
mysqli_close($db_handle);
