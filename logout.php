<?php  
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['apogee']);
	session_destroy();
	header('Location: login.php');

?>