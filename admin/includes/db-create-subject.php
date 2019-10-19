<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$sub_faculty = $_POST['sub_faculty'];
		$sub_name = $_POST['sub_name'];
		
		
		$sql = ("INSERT INTO subject(sub_name,sub_faculty) VALUES('$sub_name', '$sub_faculty')");
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../view-subject.php');
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