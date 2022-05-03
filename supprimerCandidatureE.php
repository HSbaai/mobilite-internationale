<?php  
require('functions.php');
session_start();
$id="";
if(isset($_GET['id'])) $id = $_GET['id'];
$nom=$_SESSION['username'];
$apogee=$_SESSION['apogee'];
delete_candidature($id);
header("location:index-etudiant.php");

?>