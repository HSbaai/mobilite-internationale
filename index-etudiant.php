<?php
require('functions.php');
session_start();
$nom=$_SESSION['username'];
$apogee=$_SESSION['apogee'];
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
<!-- 	<link rel="stylesheet" type="text/css" href="css/page.css">
 -->	<link rel="stylesheet" type="text/css" href="css/page.css?v=<?php echo time(); ?>">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div>

	<header>
		<nav class="navbargrande">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<img src="images/logoensak.png" height="135px" width=auto>
					</div>
					<div class="col-10">
						<ul class="navul">
							<li><a href="#" >ENSAKH</a></li>
							<li><a href="#concours">Concours</a></li>
							<li><a href="#mescandidatures">Mes candidatures</a></li>
							<li class="dropper"><a href="#" >Ecoles en partenaires  <i class="fa fa-angle-down" ></i></a>
								<div class="dropdown">
									<?php  
									$partenaires=get_partenaires();

									foreach ($partenaires as $value) {

									?>
									<a href="<?php echo $value['site_web'] ?>" class="list-group-item list-group-item-action" aria-current="true"><?php echo $value['nom_partenaire'] ?></a>
									<?php } ?>
								</div>
							</li>
							<li><a href="#resultats">Resultats</a></li>
							<li class="dropperspan"><i class="fa fa-user" style="color: #1163ad; font-size: 20px;"> <span id="current_user" style="font-size: 18px; color: #1163ad;"><?php  echo $nom;?></span></i>
								<div class="dropdownspan">
									<a href="logout.php"><center>Déconnexion</center></a>
									<a href=""><center>modifier mot de passe</center></a>
									<a href="<?php echo "importer-CV-Lettre.php" ?>"><center>Importer CV, lettre motivation</center></a>
								</div>
							</li>
						</ul>
					</div>
					
				</div>
			</div>
		</nav>
		<nav class="navbarpetite">
				<div class="head">
					<div class="container">
						<div>
							<a href="logout.php" style="color:white; text-align: left;"><i class="fa fa-sign-out" aria-hidden="true"></i> Deconnexion</i></a>
						</div>
					</div>
				</div>


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
							<li><a href="#">ENSAKH</a></li>
							<li><a href="#concours">Concours</a></li>
							<li><a href="#mescandidatures">Mes candidatures</a></li>
							<li><a href="#resultats">Resultats</a></li>
							<li class="dropperphone"><a href="#" >Ecoles en partenaires  <i class="fa fa-angle-down" ></i></a>
								<div class="dropdownphone">
									<?php  

									foreach ($partenaires as $value) {

									?>
									<a href="<?php echo $value['site_web'] ?>" class="list-group-item list-group-item-action" aria-current="true"><?php echo $value['nom_partenaire'] ?></a>
									<?php } ?>
								</div>
								<li><a href="<?php echo "importer-CV-Lettre.php" ?>"><center>Importer CV, lettre motivation</center></a></li>
							</li>

						</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<h2 id="concours">Concours</h2>
		<hr>
		<div class="container-fluid">
			<?php 
				$concours=get_concours();
				foreach ($concours as $value) {

				?>
				<div class="card" style="padding: 20px;">
	      			<h3><?php  
						$nomCnc = $value['nom_concours'];
						echo $value['nom_concours'] ?></h3>
					<span class="information">Etat: </span>
						<?php  $etat = $value['etat']; 
						if ($etat == "ouvert") {
							echo "<span style='color: #02c235;'>$etat</span>";
						}
						else echo "<span style='color: #d61200;'>$etat</span>";
					?>
					<p class="details information">Plus de details  &rArr;</p>
					<div class="hider">
						<table class=''>
						<tr>
							<th>Date de début:  </th>
							<td><?php  echo $value['date_debut'] ?></td>
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
							<td><?php  echo $value['calend_concours'] ?></td>
						</tr>
						<?php 
						$result=check_candidature($nomCnc, $apogee);
						if ($result or ($etat == "ferme")) {
						// echo "<tr><td colspan='2' style='text-align: center;'><a href=''><button type='button' class='btn btn-succes' >Candidater</button></a></td></tr>";
						echo "<br>";
					}
					else{
						?>
					
					<tr><td colspan="2" style="text-align: center;"><a onclick="return confirm('Etes vous sur de vouloir candidater pour le concours?')" href="<?php echo "candidater.php?nomCnc=$nomCnc" ?>"><button type="button" class="btn btn-primary" id="candidater">Candidater</button></a></td></tr>
						<?php
						}
						echo "</table></div></div><br>";
			}
			?>
		</div>
		<h2 id="mescandidatures">Mes candidatures</h2>
		<hr>
		<div class="container-fluid">
			<div class="panel panel-primary">
                	<div class="panel-body">
                    <table class="table">
				<?php
				$candsE=get_candidature($apogee); 
		      	$numCandidature=1;
		      	?>
		      	<thead>
		      		<tr><th>Candidature</th><th>Nom concours</th><th>Action</th></tr>
		      	</thead>
		      	<?php
		      	foreach ($candsE as $value) {
		      		$id=$value['idCandidature'];
				 ?> 
				<tr>
					<th><?php echo "N°" . $numCandidature ?></th>
					<td><?php echo $value['nomConcours'] ?></td>
					<td><a onclick="return confirm('Etes vous sur de vouloir supprimer la candidature?')" href="<?php echo"supprimerCandidatureE.php?id=$id"?>"><i class="fa fa-trash" style="font-size: 20px;"></i>supprimer</a></td>
				</tr>
			<?php 
				$numCandidature++;
			} ?>
			</table>
		</div>
	</div>
		</div>
	</div>
	<div class="container">
		<h2 id="resultats">Resultats</h2>
		<hr>
		<div class="container-fluid">
			<div class="panel panel-primary">
                	<div class="panel-body">
                    <table class="table">
				<?php
		      	$numCandidature=1;
		      	?>
		      	<thead>
		      		<tr><th>Candidature</th><th>Nom concours</th><th>Resultat</th></tr>
		      	</thead>
		      	<?php
		      	foreach ($candsE as $value) {
		      		$id=$value['idCandidature'];
				 ?> 
				<tr>
					<th><?php echo "N°" . $numCandidature ?></th>
					<td><?php echo $value['nomConcours'] ?></td>
					<td>
						<?php 
							if ($value['etat']=="non encore traiter") {
								echo "Les resultats pour ce concours sont pas encore disponible";
							}
							elseif ($value['etat']=="admis") {
								echo "Vous etes admis pour ce concours";
							}
							else echo "Vous n'etes pas admis pour ce concours";


						 ?>
					</td>
				</tr>
			<?php 
				$numCandidature++;
			} ?>
			</table>
		</div>
	</div>
		</div>
	</div>
	<div class="container">
		<h2 id="partenaires">Partenaires</h2>
		<hr>
			<ul class="partanaires">
				<?php  
					foreach ($partenaires as $value) {
						$nompartenaire=$value['nom_partenaire'];
						$site = $value['site_web'];
				?>
					<li ><a href="<?php echo "$site" ?>"><img src="<?php echo "photos/$nompartenaire.png" ?>" class="imagepartenaires"></a></li>
				<?php } ?>
			</ul>
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
	    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
	  </div>
	  <!-- Copyright -->
	</footer>
<!-- Footer -->
</div>
<button class="topbutton btn btn-light btn-sm shadow-none" id="topbutton" onclick="topfunction()" ><i class="fa fa-angle-up" style="margin-left: 4px; font-size: 20px;"></i></button>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/page.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>