<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$ID = $_GET['ID'];
		$type = $_GET['type'];
		$f = 0;
		if($type=="Task")
		{
			$sql = "UPDATE ems_task SET adminStatus=$f WHERE ID=$ID";
		}
		elseif($type=="Event")
		{
			$sql = "UPDATE ems_event SET adminStatus=$f WHERE ID=$ID";
		}
		elseif($type=="Note")
		{
			$sql = "UPDATE ems_notes SET adminStatus=$f WHERE ID=$ID";
		}
		elseif($type=="Leave")
		{
			$sql = "UPDATE ems_leave SET adminStatus=$f WHERE ID=$ID";
		}
		
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../notification.php');
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