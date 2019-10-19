<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x' ";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$title = $_POST["title"];
		$createDate = date("d/m/Y h:i");
		$detail = $_POST["detail"];
		$startDate = $_POST["startDate"];
		$location = $_POST["location"];
		$creatorID = $row['ID'];
		$f = 1;
		
		// Atttachment
		$target_dir = "../../attachment/event/";
		$target_file = $target_dir . basename($_FILES["attachment"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
			} 
			else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		
		$sql = ("INSERT INTO ems_event(title, detail, createDate, startDate, attachment, location, creatorID, flagStatus, adminStatus) VALUES('$title', '$detail', '$createDate', '$startDate', '$target_file', '$location', '$creatorID', '$f', '$f')");
		
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