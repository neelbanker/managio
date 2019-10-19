<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x' ";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$empID = $row['ID'];
		$title = $_POST['title'];
		$receiverID = $_POST['receiverID'];
		$createDate = date("m/d/Y");
		$leaveSubmissionDate = date("m/d/Y");
		$leaveType = $_POST['leaveType'];
		$leaveStartDate = $_POST['leaveStartDate'];
		$leaveEndDate = $_POST['leaveEndDate'];
		$leaveMessage = $_POST['leaveMessage'];
		$leaveStatus = "Apply";
		$f = 1;
		
		// Atttachment
		$target_dir = "../../attachment/leave/";
		$target_file = $target_dir . basename($_FILES["attachment"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		$sql = "INSERT INTO ems_leave(receiverID, empID, title, createDate, leaveSubmissionDate, leaveType, leaveStartDate, leaveEndDate, leaveMessage, leaveStatus, leaveAttachment, flagStatus, adminStatus) VALUES('$receiverID', '$empID', '$title', '$createDate', '$leaveSubmissionDate', '$leaveType', '$leaveStartDate', '$leaveEndDate', '$leaveMessage', '$leaveStatus', '$target_file', '$f', '$f')";
		$result = $conn->query($sql);	
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