<?php 

require "config.inc.php";


// ############## Login ####################

function check_login ( $login, $Password ) {
	global $db_config;

	$results = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		
		$logsql ="SELECT * FROM admin WHERE apogee='$login' and password='$Password'";

		$logquery = $pdo->prepare($logsql);
		$logquery->execute();
		$results=$logquery->fetch();
		$logquery->closeCursor();

	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}
	return $results;
} 
//###################Espace Etudiant########################

function get_concours () {

	global $db_config;

	$concours = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$sql = "SELECT * from concours";
				$query = $pdo->prepare($sql);
				$query->execute();
				while ($ligne=$query->fetch()) {
					$concours[] = $ligne;
				}

		$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $concours;

}

function check_candidature ( $nomCnc, $apogee ) {
	global $db_config;

	$result = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		
		$requete = "SELECT * from candidatures WHERE nomConcours='$nomCnc' and apogeeEtudiant='$apogee'";
				$querysearch =$pdo->prepare($requete);
				$querysearch->execute();
				$result=$querysearch->fetch();

				$querysearch->closeCursor();

	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}
	return $result;
} 


function get_candidature ($apogee) {

	global $db_config;

	$candidatures = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$requetecand="SELECT * from candidatures where apogeeEtudiant='$apogee'";
				$querycand=$pdo->query($requetecand);
				while($ligne = $querycand->fetch(PDO::FETCH_ASSOC)) {

		            	$candidatures[] = $ligne;
		      	}

				$querycand->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $candidatures;

}


function get_partenaires () {

	global $db_config;

	$partenaires = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$sql = "SELECT * from partenaires";
					$query = $pdo->prepare($sql);
					$query->execute();
				while ($ligne = $query->fetch()) {
					$partenaires[] = $ligne;
				}

		$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $partenaires;

}

function listCandidaturesNonfiliere ($searchInput) {

	global $db_config;

	$candidatures = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$requetesearch="SELECT * FROM candidatures WHERE (apogeeEtudiant  LIKE '%$searchInput%' OR nomEtudiant LIKE '%$searchInput%')
                order by idCandidature";

                $querysearch = $pdo->query($requetesearch);
			    while($ligne = $querysearch->fetch(PDO::FETCH_ASSOC)) {

			            $candidatures[] = $ligne;
			        }

				$querysearch->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $candidatures;

}


function listCandidaturesfiliere ($searchInput, $filiere) {

	global $db_config;

	$candidatures = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$requetesearch="SELECT * FROM candidatures WHERE filiereEtudiant='$filiere' AND (apogeeEtudiant  LIKE '%$searchInput%' OR nomEtudiant LIKE '%$searchInput%')
                order by idCandidature
                ";

                $querysearch = $pdo->query($requetesearch);
			    while($ligne = $querysearch->fetch(PDO::FETCH_ASSOC)) {

			            $candidatures[] = $ligne;
			        }

				$querysearch->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $candidatures;

}

//###################ajouter choses######################
function add_concours ( $name, $begindate, $stat, $conditions, $procedurec, $procedurea, $datetest) {

		global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



	$sql = "INSERT INTO concours (nom_concours, date_debut, etat, cond_admission, proc_admission, proc_candidature, calend_concours) VALUES ('$name', '$begindate', '$stat', '$conditions', '$procedurea', '$procedurec', '$datetest') ";
        $query = $pdo->prepare($sql);
        $query->execute();

	$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

}


function addCandidature ( $nom, $apogee, $filiere, $nomCnc, $etat) {

		global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



	$requestAdding="INSERT INTO candidatures (apogeeEtudiant, nomEtudiant, nomConcours, filiereEtudiant, etat, idCandidature) VALUES ('$apogee', '$nom', '$nomCnc', '$filiere', '$etat', NULL)";
        $queryAdding=$pdo->prepare($requestAdding);
        $queryAdding->execute();

	$queryAdding->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

}



function getE ($apogee) {

		global $db_config;
		$etudiant = array();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



		$requestselectEtudiant = "SELECT * from admin WHERE apogee='$apogee'";
		$query = $pdo->prepare($requestselectEtudiant);
		$query->execute();
		$etudiant=$query->fetch();
		$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}
	return $etudiant;
}

function update_password ($apogee, $newpassword) {

		global $db_config;

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



		$sql="UPDATE admin SET password = '$newpassword' where apogee = '$apogee' ";
                $query = $pdo->prepare($sql);
                $query->execute();
		$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}
}


function update_concours($name, $begindate, $stat, $conditions, $procedurec, $procedurea, $datetest, $id) {

		global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



	$sql = "UPDATE concours set nom_concours='$name', date_debut='$begindate', etat='$stat', cond_admission='$conditions', proc_admission='$procedurea', proc_candidature='$procedurec', calend_concours='$datetest' WHERE ID_concours ='$id' ";
        $query = $pdo->prepare($sql);
        $query->execute();

	$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

}



function updateCandidature ( $nom, $apogee, $filiere, $nomCnc, $etat, $id) {

		global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



	$sql = "UPDATE candidatures set nomEtudiant='$nom', apogeeEtudiant='$apogee', filiereEtudiant='$filiere', nomConcours='$nomCnc', etat='$etat' WHERE idCandidature ='$id' ";
        $query = $pdo->query($sql);

	$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

}


function delete_concours ( $id ) {

	global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

		$request = "DELETE from concours WHERE ID_concours='$id'";
		$query = $pdo->prepare($request);
		$query->execute();
		$query->closeCursor();
	}
	catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	
}



function delete_partenaire ( $id ) {

	global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

		$request = "DELETE from partenaires WHERE ID_partenaire='$id'";
		$query = $pdo->prepare($request);
		$query->execute();
		$query->closeCursor();
	}
	catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	
}


function delete_candidature ( $id ) {

	global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

		$request = "DELETE from candidatures WHERE idCandidature='$id'";
		$query = $pdo->query($request);
		$query->closeCursor();
	}
	catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	
}



function resultatsPdfNonfiliere ($searchInput) {

	global $db_config;

	$candidatures = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$requete="SELECT * FROM candidatures WHERE (apogeeEtudiant  LIKE '%$searchInput%' OR nomEtudiant LIKE '%$searchInput%')
                order by idCandidature";

                $querysearch = $pdo->query($requete);
			    while($ligne = $querysearch->fetch(PDO::FETCH_ASSOC)) {

			            $candidatures[] = $ligne;
			        }

				$querysearch->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $candidatures;

}

function resultatsPdffiliere ($searchInput, $filiere) {

	global $db_config;

	$candidatures = array ();

	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		

				$requete="SELECT * FROM candidatures WHERE filiereEtudiant='$filiere' AND (apogeeEtudiant  LIKE '%$searchInput%' OR nomEtudiant LIKE '%$searchInput%')
                order by idCandidature";

                $querysearch = $pdo->query($requete);
			    while($ligne = $querysearch->fetch(PDO::FETCH_ASSOC)) {

			            $candidatures[] = $ligne;
			        }

				$querysearch->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

	return $candidatures;

}

function addPartenaire ($name, $site) {

		global $db_config;


	try {
	
		
		$pdo = new PDO($db_config['db_host'] . '; dbname=' . $db_config['db_name'], $db_config['db_user'], $db_config['db_password']);
		



	$sql = "INSERT INTO partenaires (nom_partenaire, site_web) VALUES ('$name', '$site')";
        $query = $pdo->prepare($sql);
        $query->execute();

	$query->closeCursor();


	}catch( PDOException $excep ) {
		echo "Erreur survenue : " . $excep->getMessage();
	}

}

?>