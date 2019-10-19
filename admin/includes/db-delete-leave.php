<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$ID = $_GET['ID'];
		
		$sql = "DELETE FROM ems_leave WHERE ID = $ID";
				
		if($result == true) {
			header('location: ../leave.php');
		}
		else
		{
			echo "ERROR :" .$sql. $conn->error;
		}
	}
	else {
		header('location: ../../index.php');
	}
?>