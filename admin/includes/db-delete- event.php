<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$ID = $_GET['ID'];
		
		$sql = "DELETE FROM ems_event WHERE ID = $ID";
		
		$result = $conn->query($sql);
		
		if($result == true) {
			header('location: ../event.php');
		}
		else
		{
			echo "ERROR";
		}
	}
	else {
		header('location: ../../index.php');
	} 
?>