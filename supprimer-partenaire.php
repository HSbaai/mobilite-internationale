<?php  
require('functions.php');
$id="";
if(isset($_GET['id'])) $id = $_GET['id'];

delete_partenaire($id);
header('location:index-admin.php');

?>