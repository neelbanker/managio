<?php
	$serverName = "localhost";
	$euserName = "root";
	$epassword = "";
	$database = "ems";
	
	$conn = new mysqli($serverName, $euserName, $epassword, $database);
	
	if($conn ->connect_error) {
		die("Connection Failed : ".$conn ->connect_error);
	}
?>