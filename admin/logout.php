<?php
	session_start();
	if($_SESSION['userName']) {
		
	}
	else {
		header('location: ../../index.php');
	} 
	session_destroy();
	header('location: ../index.php');
?>