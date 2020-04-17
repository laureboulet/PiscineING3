<?php
	include("enteteadmin.php");
	session_start();
	echo $_SESSION['emailad'];
	$nomvend = isset($_POST["nomvend"])? $_POST["nomvend"] : "";
	$pseudovend = isset($_POST["pseudovend"])? $_POST["pseudovend"] : ""; 
	$emailvend = isset($_POST["emailvend"])? $_POST["emailvend"] : ""; 	
?>
<!DOCTYPE html>
<html>
<body>
	<div align="center" class="gerer">
		<?php
		//ajouter un vendeur
		if (isset($_POST['button1'])) {
			if ($db_found) {
				$sql = "SELECT * FROM vendeur";
				if ($nomvend != "") {
					$sql .= " WHERE Nomvend LIKE '%$nomvend%'"; 
					if ($pseudovend != "") {
						$sql .= " AND Pseudovend LIKE '%$pseudovend%'";
					}
				}
				$result = mysqli_query($db_handle, $sql);
				if (mysqli_num_rows($result) != 0) {
					echo "Ce vendeur existe déjà";
				} 
				else { //comment récupérer valeur de la clé primaire de admin
					session_start();
					$etranger = $_SESSION['Idad']; 
					$sql = "INSERT INTO vendeur(Nomvend, Pseudovend, Emailvend, Mdpvend, Advend)
						VALUES('$nomvend', '$pseudovend', '$emailvend', '0000', '$etranger')"; 
					$result = mysqli_query($db_handle, $sql);
						echo "Vous avez bien ajouté un vendeur.";
				}
			}
			else{
				echo "Database not found";
			} 
		}
		//Supprimer un vendeur
		if (isset($_POST['button2'])) {
			if ($db_found) {
				$sql = "SELECT * FROM vendeur";
				if ($nomvend != "") {
					$sql .= " WHERE Nomvend LIKE '%$nomvend%'"; 
					if ($pseudovend != "") {
						$sql .= " AND Pseudovend LIKE '%$pseudovend%'";
					} 
				}
				$result = mysqli_query($db_handle, $sql); 
				if (mysqli_num_rows($result) == 0) {
					//vendeur inexistant
					echo "Ce vendeur ne peut pas etre supprime, il n'existe pas.";
				} 
				else { 
					while ($data = mysqli_fetch_assoc($result) ) { 
						$idvend = $data['Idvend'];
						echo "<br>";
					}
					$sql = "DELETE FROM vendeur";
					$sql .= " WHERE Idvend = $idvend";
					$result = mysqli_query($db_handle, $sql); 
					echo "Vendeur supprimé avec succès.";
				}
			}
			else{
				echo "Database not found";
			}
		}
		?>
		<form action="gerervendeur.php" method="post" class="admin">
			<table>
				<tr>
					<td>Nom</td>
					<td><input required="required" type="text" class="login-admin" name="nomvend"></td>
				</tr>
				<tr>
					<td>Pseudo</td>
					<td><input required="required" type="text" class="login-admin" name="pseudovend"></td>
				</tr>
				<tr>
					<td>E-mail
					</td>
					<td><input required="required" type="email" class="login-admin" name="emailvend"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="Ajouter un vendeur" name="button1">
						<input type="submit" value="Supprimer un vendeur" name="button2">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<footer class="page-footer text-center baspage"> 
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