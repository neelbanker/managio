<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x' ";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$createrID = $row['ID'];
		$createDate = date("m/d/Y");
		$receiverID = $_POST['receiverID'];
		$title = $_POST['title'];
		$note = $_POST['note'];
		$attachment = $_POST['attachment'];
		$f = 1;

		$sql = "INSERT INTO `ems_notes`(`createDate`, `receiverID`, `createrID`, `title`, `note`, `attachment`, `flagStatus`, `adminStatus`) VALUES ('$createDate', '$receiverID', '$createrID', '$title', '$note','$f', '$f')";
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../notes.php');
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