<?php
	include("enteteadmin.php");
	session_start();
	$Nomitem = isset($_POST["Nomitem"])? $_POST["Nomitem"] : "";
	$Description = isset($_POST["Description"])? $_POST["Description"] : ""; 
	$achat = isset($_POST["achat"])? $_POST["achat"] : "";
	$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
	$prixItem = isset($_POST["prixItem"])? $_POST["prixItem"] : ""; 
	$photo1 = isset($_FILES["photo1"])? $_FILES["photo1"] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter item par admin</title>
</head>
<body>
	<?php
	$photo1 = $_FILES['photo1']['name'];
	//$photo1 = basename($_FILES['photo1']['name']);
	if(isset($_POST["vendreItem"])){
		if ($db_found) {
			$sql = "SELECT * FROM item";
			if ($Nomitem != "") {
				$sql .= " WHERE Nomitem LIKE '%$Nomitem%'"; 
				if ($Description != "") {
					$sql .= " AND Description LIKE '%$Description%'";
				}
			}
			$result = mysqli_query($db_handle, $sql);
			if (mysqli_num_rows($result) != 0) {
				echo "Cet item existe déjà";
			} 
			else { 
				session_start();
				$etranger = $_SESSION['Idad']; 
				$sql = "INSERT INTO item(Nomitem, Prixitem, Description, Categorie, Aditem, Photo1, Typeachat)
					VALUES('$Nomitem', $prixItem, '$Description', '$categorie',$etranger, '$photo1', '$achat')"; 
				$result = mysqli_query($db_handle, $sql);
				echo "Vous avez bien ajouté un item.";
			}
		}
		else{
			echo "Database not found";
		} 
	}
	?>
	<form method="post" class="item" action="ajoutitem.php" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<table>
						<tr>
							<td class="champs">Nom</td><br>
						</tr>
						<tr>
							<td><input required="required" type="text" name="Nomitem" id ="nom" class="ajout-item"></td>
						</tr>
						<tr>
							<td class="champs"> Description </td><br>
						</tr>
						
						<tr>
							<td><textarea required="required" name="Description" id ="description" class="ajout-item"></textarea></td>
						</tr>
						<tr >
							<td class="text-danger" > <br><br><br>Remarque : aucun item peut être à vendre par enchère et par meilleure offre en même temps!</td>
						</tr>
					</table>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12" style="padding-left:350px;">
					<table>
						<tr>
							<td class="champs"> Photo </td>
						</tr>
						<tr>
							<td class="encadre"><label for="photoitem" class="imageItem">Choisir une photo</label>
								<!--<input type="hidden" name="MAX_SIZE_FILE" value="100000">-->
								<input type="file" id="photoitem" class="inputcache" name="photo1" accept="image/png,image/jpeg"></td><!--accept="image/png"-->
						</tr>
						<tr>
							<td class="champs"> Vidéo(si disponible) </td>
						</tr>
						<tr>
							<td class="encadre"><label for="photoitem" class="imageItem">Choisir une vidéo</label><input type="file" id="photoitem" class="inputcache" name="videoitem" accept="image/png"></td>
						</tr>
					</table>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12" >
					<table class="choixmultiple" style="cellspacing:30px;">
						<tr>
							<td class="champs" width="300"> Catégorie </td>
							<td class="champs" id="typeachat" width="300"> Achat </td>
							<td class="champs" id="prix"> Prix </td>			
						</tr>
						<tr>
							<td> 
								<div class="categorie" style="width:200px;">
									<select name="categorie" id="categorie" required="required">
										<option value=""></option>
										<option value="Ferraille ou Trésor">Ferraille ou Trésor</option>
										<option value="Bon pour le Musée">Bon pour le Musée</option>
										<option value="Accessoire VIP">Accessoire VIP</option>
									</select>
								</div>
							</td>
							<td>
								<div class="typeachat" style="width:200px;">
									<select name="achat" id="typeachat" required="required">
										<option value=""></option>
										<option value="Enchères">Enchères</option>
										<option value="Meilleure offre">Meilleure offre</option>
										<option value="Achat immédiat">Achat immédiat</option>
										<option value="Enchères et Achat immédiat">Enchères et Achat immédiat</option>
										<option value="Meilleure offre et Achat immédiat">Meilleure offre et Achat immédiat</option>
									</select>
								</div>
					 		</td>
						 	<td><input required="required" type="number" name="prixItem" id="prix" class="ajout-item"></td>
						 	<td style="font-size: 20px">€</td>
							<td class="ajout" colspan="2" align="left"><input type="submit" name="vendreItem" value="Ajouter" /></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</form>
	<footer class="page-footer text-center"> 
		<div id="nav">
            <a class="link" href="accueiladmin.html">Accueil |</a>
            <a class="link" href="gereritem.php">Items en vente |</a>
            <a class="link" href="gerervendeur.php">Vendeurs |</a>
            <a class="link" href="#">Enchères</a>
        </div>
        <br>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">A propos de nous</h6> 
					<h7><a class="info" href="#">Qui sommes-nous?</a></h7><br>
					<h7><a class="info" href="#">Notre histoire</a></h7>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">Informations légales</h6>
					<h7><a class="info" href="#">Conditions générales d'utilisation</a></h7><br>
					<h7><a class="info" href="#">Conditions générales de vente</a></h7><br>
					<h7><a class="info" href="#">Vie privée / Cookies</a></h7>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<h6 style="border-bottom: 2px solid #000000" class="text-uppercase font-weight-bold">Nous contactez</h6>
					<p>
					Ebay ECE <br>
					37, quai de Grenelle, <br>
					75015 Paris, France <br> 
					<a style="color:#7EC6A3" href="mailto:ebayece@edu.ece.fr">ebayece@edu.ece.fr</a>
					</p> 
				</div>
				<div>
					<h6 class="text-uppercase font-weight-bold">Retrouvez-nous sur</h6>
					<img src="facebook.png" alt="facebook" width="20" height="20"/>
					<img src="instagram.png" alt="instagram" width="20" height="20"/>
					<img src="twitter.png" alt="twitter" width="20" height="20"/>
					<img src="linkedin.png" alt="linkedin" width="20" height="20"/>
				</div>
			</div>
			<div style="color:#7EC6A3" id="footer-copyright">N°1 de site de vente en ligne
			</div> 
		</div>
	</footer>
</body>
</html>
<?php
	mysqli_close($db_handle);
?>
