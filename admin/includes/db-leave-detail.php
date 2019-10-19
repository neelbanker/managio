<?php
	session_start();
		if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$ID = $_GET['ID'];
		$status = $_GET['status'];
		$f = 1;
		
		$sql = "UPDATE ems_leave SET leaveStatus = '$status', flagStatus = '$f', adminStatus = '$f' WHERE ID = '$ID'";
		$result = mysqli_query($conn, $sql);
		
		if($result == true) {
			$sql = "SELECT leaveStatus FROM ems_leave WHERE ID = '$ID'";
			$result = mysqli_query($conn, $sql);
			$row = $result->fetch_assoc();
			if($row['leaveStatus'] == "Reject")
			{
				header('location: ../leave-detail.php?ID='.$ID);
			}
			elseif($row['leaveStatus'] == "Approve")
			{
				header('location: ../leave-detail.php?ID='.$ID);
			}
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