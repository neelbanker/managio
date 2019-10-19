<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$ID = $_GET['ID'];
		$sql = "SELECT ID From ems_employee where userName = '$x'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$title = $_POST["title"];
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];
		$detail = $_POST["detail"];
		$creatorID = $row['ID'];
		$receiverID = $_POST["receiverID"];
		$status = "Pending";
		$f = 1;
					
		$sql = ("UPDATE ems_task SET title='$title', detail='$detail', startDate='$startDate', endDate='$endDate', creatorID='$creatorID', receiverID='$receiverID', status='$status', flagStatus = '$f', adminStatus ='$f' WHERE ID=$ID");
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