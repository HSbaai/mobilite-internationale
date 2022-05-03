<?php
session_start();
require('functions.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$Password=$_POST['password'];
$results=check_login ( $username, $Password );
if($results)
{
  $apogee=$results['apogee'];
  $nom=$results['nom'];
  $_SESSION['username'] = $nom;
  $_SESSION['apogee'] = $apogee;
  if ($results['apogee'] == $Password) 
  {
    
    header("Location: changer-password.php");
  }
  else {
    header("Location: index-etudiant.php");
    }
  }
else{
header("Location: login.php?message=invalid");
}

}

?>