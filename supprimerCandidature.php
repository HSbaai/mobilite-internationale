<?php  
require('functions.php');
$id="";
if(isset($_GET['id'])) $id = $_GET['id'];

delete_candidature($id);
header('location:listeCandidatures.php');

?>