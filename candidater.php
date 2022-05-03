<?php 
  session_start();
  require('functions.php');	
  $apogee = $_SESSION['apogee'];
  $nomCnc = "";
  if(isset($_GET["nomCnc"])) $nomCnc = $_GET["nomCnc"];

  $E=getE($apogee);
  $nomE=$E['nom'];
  $filiereE=$E['filiere'];
  $etat="non encore traiter";
  addCandidature ($nomE, $apogee, $filiereE, $nomCnc, $etat);
  header("location:index-etudiant.php");

 ?>