<?php
	include("enteteadmin.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<body>
	<div id="cadre" align="left" class="gereritem">
		<?php
		if (isset($_POST["buttonaction"])) {
			header('Location: ajoutitem.php');
		}
		if(isset($_POST["buttonaction2"])){
			header('Location: supprimeritemadmin.php');
		}
		?>
		<form method="post" class="actionitem" action="gereritem.php">
			<table>
				<tr>
					<td>Voulez-vous ajouter ou <br>supprimer un item ?</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="buttonaction" value="Ajouter">
						<input type="submit" name="buttonaction2" value="Supprimer">
					</td>
				</tr>
			</table>
		</form>
	</div>	
	<div id="footer">
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
			<div style="color:#7EC6A3; text-align: center" id="footer-copyright">N°1 de site de vente en ligne
			</div> 
		</div>
	</div>
</body>
</html>
<?php
	mysqli_close($db_handle);
?>