<?php  
require('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mobilité internationale</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/mdb.min.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="css/page-admin.css?v=<?php echo time(); ?>">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div>
	<header>
		<nav class="navbargrande">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<img src="images/logoensak.png" height="135px" width=auto>
					</div>
					<div class="col-9">
						<ul class="navul">
							<li><a href="#concours" >Liste des concours</a></li>
							<li><a href="listeCandidatures.php">Liste des candidatures</a></li>
							<li><a href="#partenaires">Liste des partenaires</a></li>
							<li><a href="#resultats">Resultats</a></li>
						</ul>
					</div>
					
				</div>
			</div>
		</nav>
		<nav class="navbarpetite">
			<div class="container">
				<div class="row">
					<div class="col-9">
						<img src="images/logoensak.png" height="80px" width=auto>
					</div>
					<div class="col-3">
						<button type="button" id="buttonburger" class="btn btn-sm"><i class="fa fa-bars"></i></button>
					</div>
				</div>
				<div class="burger">
					<ul class="burgerul">
							<li><a href="#" >Liste des concours</a></li>
							<li><a href="#">Liste des candidatures</a></li>
							<li><a href="#">Liste des partenaires</a></li>
							<li><a href="#">Resultats</a></li>
						</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<h2 id="concours">Liste des concours</h2>
		<hr>
		<div class="container-fluid">
			<?php 
				$concours=get_concours();
				echo "<table class='center caption-top'>";
				foreach ($concours as $value) {
					$id=$value['ID_concours'];

				?>
				
				<tr><td colspan="2"><h3><?php  
					$nom = $value['nom_concours'];
					echo $nom ?>
				</h3></td></tr>
				<tr>
					<th>Date de début:  </th>
					<td><?php  
						$date_debut = $value['date_debut'];
						$date_debut = strtotime($date_debut);
						echo htmlentities($value['date_debut']) ?></td>
				</tr>
				<tr>
					<th>Etat: </th>
					<td><?php  $etat = htmlentities($value['etat']); 
					if ($etat == "ouvert") {
						echo "<span style='color: #02c235;'>$etat</span>";
					}
					else echo "<span style='color: #d61200;'>$etat</span>";
				?>
					</td>
				</tr>
				
				<tr>
					<th>Conditions d’admission: </th>
					<td><?php  $cond = $value['cond_admission'];
					$cond_array = explode("\n", $cond);
					foreach ($cond_array as $condition) {
					 	echo "$condition<br>";
					 } 
				?>
					
				</td>
				</tr>
				<tr>
					<th>Procédure de sélection: </th>
					<td><?php  $proca = $value['proc_admission'];
					$proca_array = explode("\n", $proca);
					foreach ($proca_array as $processusa) {
					 	echo "$processusa<br>";
					 } 
					?>
						
					</td>
				</tr>
				<tr>
					<th>Procédure de candidature: </th>
					<td><?php  $procc = $value['proc_candidature'];
					$procc_array = explode("\n", $procc);
					foreach ($procc_array as $processusc) {
					 	echo "$processusc<br>";
					 }
				?>
					
				</td>
				</tr>
				<tr>
					<th>Calendrier du concours: </th>
					<td><?php  
						$calend_concours = $value['calend_concours'];
						$calend_concours = strtotime($calend_concours);
						echo htmlentities($value['calend_concours']) ?></td>
				</tr>
				<tr>
					<td style="text-align: center;" colspan="10">
					<a href='<?php echo "modifier-concours.php?id=$id&nom=$nom&date_debut=$date_debut&etat=$etat&cond=$cond&proca=$proca&procc=$procc&calend_concours=$calend_concours" ?>'>
						<button type='button' class='btn btn-light shadow-none' onclick= "return confirm('Vous souhaitz modifer?');">modifier concours
						</button>
					</a>
					</td></tr>
					<tr><td style="text-align: center;" colspan="10">
					<a href='<?php echo "supprimer-concours.php?id=$id" ?>' onclick= "return confirm('Vous souhaitez supprimer?');">
						<button type='button' class='btn btn-light shadow-none'>Supprimer concours
						</button>
					</a>
					</td>
				</tr>
				
				
			<?php } 
			echo "</table>"
			?>
			<?php echo "<a href='ajouter-concours.php'><button type='button' class='btn btn-light'>Ajouter concours</button></a>"?>
		</div>
		<h2 id="">Liste des candidatures</h2>
		<hr>
		<div>
			<p><a href="listeCandidatures.php">Affichier toutes les candidatures</a></p>
		</div>
		<h2 id="resultats">Resultats</h2>
		<hr>
		<div>
			<h6>Pour modifier les resultats vous devez <a href="listeCandidatures.php">consulter</a> la liste des candidatures</h6>	
		</div>
		<h2 id="partenaires">Liste des partenaires</h2>
		<hr>
		<div>
			<?php 
				$partenaires=get_partenaires();

				echo "<table class='center'>";
				foreach ($partenaires as $value) {
					$id=$value['ID_partenaire'];

				?>
			
				<tr>
					<th><?php echo $value['nom_partenaire']; ?></th>
					<td><a href="<?php echo "supprimer-partenaire.php?id=$id" ?>">
					<button type='button' class='btn btn-light shadow-none' onclick="return confirm('Etes vous sur de vouloir supprimer ce partenaire?')">Supprimer partenaire
					</button>
					</a>					</td>
				</tr>
			<?php 
			} 
			echo "</table>";
			?>
			<?php 
			echo "<a href='ajouter-partenaire.php'><button type='button' class='btn btn-light'>Ajouter partenaire</button></a>" 
			?>
		</div>

	</div>


			<!-- Footer -->
	<footer class="text-center text-lg-start footer text-muted" >
	  <!-- Section: Social media -->
	  <section
	    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
	    <!-- Left -->
	    <div class="me-5 d-none d-lg-block">
	      <span>Rejoignez-nous sur les réseaux sociaux :</span>
	    </div>
	    <!-- Left -->

	    <!-- Right -->
	    <section class="me-4">
      <!-- Facebook -->
	      <a class="btn btn-primary btn-floating me-3" style="background-color: #3b5998" href="#!" role="button"><i class="fa fa-facebook" style="margin-top: 12px;font-size: 15px;margin-left: 4px;"></i></a>



	      <!-- Google -->
	      <a class="btn btn-primary btn-floating me-3" style="background-color: #dd4b39" href="#!" role="button"><i class="fa fa-google" style="margin-top: 12px;font-size: 15px;margin-left: 4px;"></i></a>



	      <!-- Linkedin -->
	      <a class="btn btn-primary btn-floating me-3" style="background-color: #0082ca; " href="#!" role="button"><i class="fa fa-linkedin" style="margin-top: 12px;font-size: 15px;margin-left: 4px;"></i></a>
	      <!-- Github -->

    	</section>
	    <!-- Right -->
	  </section>
	  <!-- Section: Social media -->

	  <!-- Section: Links  -->
	  <section class="">
	    <div class="container text-center text-md-start mt-5">
	      <!-- Grid row -->
	      <div class="row mt-3">
	        <!-- Grid column -->
	        <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-4">
	          <!-- Content -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            <i class="fas fa-gem me-3"></i>ENSA Khouribga
	          </h6>
	          <p>
	            L’ENSA dispense en formation initiale un enseignement supérieur destiné à former, principalement, des ingénieurs d’état hautement qualifiés d’un point de vue scientifique et technique et ce dans différentes spécialités.
	          </p>
	        </div>
	        <!-- Grid column -->

	        

	        

	        <!-- Grid column -->
	        <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mb-md-0 mb-4">
	          <!-- Links -->
	          <h6 class="text-uppercase fw-bold mb-4">
	            Contact
	          </h6>
	          <p><i class="fa fa-home me-3"></i> Ecole Nationale des Sciences Appliquées Bd Béni Amir, <br>BP 77 Khouribga - Maroc.</p>
	          <p>
	            <i class="fa fa-envelope me-3"></i>
	            <a href="mailto:contact.ensak@usms.ma">contact.ensak@usms.ma</a>
	          </p>
	          <p><i class="fa fa-phone me-3"></i> +212523492335  / +212618534372</p>
	          <p><i class="fa fa-print me-3"></i> 0523492339</p>
	        </div>
	        <!-- Grid column -->
	      </div>
	      <!-- Grid row -->
	    </div>
	  </section>
	  <!-- Section: Links  -->

	  <!-- Copyright -->
	  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
	    © 2021 Copyright:
	    <span class="text-reset fw-bold">WEBMASTER: <a href="mailto:haytham.sbaai@gmail.com">SBAAI Haytham</a> - <a href="">MABROUK Kamal</a></span>
	  </div>
	  <!-- Copyright -->
	</footer>
<!-- Footer -->
</div>
<button class="topbutton btn btn-light btn-sm shadow-none" id="topbutton" onclick="topfunction()" ><i class="fa fa-angle-up" style="margin-left: 4px; font-size: 20px;"></i></button>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/page.js"></script>
<script type="text/javascript" src="js/bootstap.min.js"></script>
</body>
</html>