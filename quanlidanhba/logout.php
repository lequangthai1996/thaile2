<?php 
	session_start();
	if($_SESSION['user'] != ""){
		session_unset();
		session_destroy();
		header("location: login.php");
	}
 ?>