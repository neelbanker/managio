<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$ID = $_GET['ID'];
		
		$sql = ("DELETE FROM ems_task WHERE ID = $ID");
		$result = $conn->query($sql);
		
		if($result == true) {
			header("location: ../task-detail.php?ID=$ID");
		}
		else{
			echo "ERROR :" .$sql. $conn->error;
		}
	}
	else {
		header('location: ../../index.php');
	} 
?>