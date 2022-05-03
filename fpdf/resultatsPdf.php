<?php  
	require '../functions.php';
	$searchInput = "";
      if(isset($_GET["searchInput"])) $searchInput = $_GET["searchInput"];
      if(isset($_GET["filiere"])) 
        $filiere = $_GET["filiere"];
        else $filiere = "0";

        $cands = array();

       if($filiere=="0"){
        $cands = resultatsPdfNonfiliere($searchInput);
    }else{
        $cands = resultatsPdffiliere ($searchInput, $filiere);
        
    }
    require('fpdf.php');


	$pdf = new FPDF('P', 'mm', 'A5');
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 16);

	$pdf->Image('ensa-khouribga.png', 5, 5, 50, 20);
	$pdf->Image('logo-beni-mellal.png', 115, 5, 15, 15);
	$pdf->Ln(18);
	$pdf->Cell(0, 10, 'Liste des candidatures', 'TB', 1, 'C');
	$pdf->Ln(18);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(25,5,'Nom etudiant',1,0,'L',0);
	$pdf->Cell(20,5,'Apogee',1,0,'L',0);
	$pdf->Cell(15,5,'Filiere',1,0,'L',0);
	$pdf->Cell(50,5,'Nom concours',1,0,'L',0);
	$pdf->Cell(25,5,'Etat',1,0,'L',0);
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 8);

	foreach ($cands as $value) {
		$nomE=$value['nomEtudiant'];
		$apogee=$value['apogeeEtudiant'];
		$filiere=$value['filiereEtudiant'];
		$nomCnc=$value['nomConcours'];
		$etat=$value['etat'];
		$pdf->Cell(25,5,$nomE,1,0,'L',0);
		$pdf->Cell(20,5,$apogee,1,0,'L',0);
		$pdf->Cell(15,5,$filiere,1,0,'L',0);
		$pdf->Cell(50,5,$nomCnc,1,0,'L',0);
		$pdf->Cell(25,5,$etat,1,0,'L',0);
		$pdf->Ln(5);
	}


	$pdf->Output('', '', true);


?>