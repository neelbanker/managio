<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$ID = $_GET['ID'];
		$title = $_POST["title"];
		$detail = $_POST["detail"];
		$startDate = $_POST["startDate"];
		$location = $_POST["location"];
		$creatorID = $row['ID'];
		$f = 1;
		
		$sql = "UPDATE ems_event SET title='$title', detail='$detail', startDate='$startDate', location='$location', creatorID='$creatorID', flagStatus = '$f', adminStatus = '$f' WHERE ID=$ID";
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../event-detail.php?ID='.$ID);
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