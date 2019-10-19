<?php
	include "../config/connectDB.php";
	
	$email = $_REQUEST['email'];
	$uPassword = $_REQUEST['uPassword'];
	$sql = "SELECT * FROM ems_employee WHERE userName = '$email' and uPassword = '$uPassword' and role=2 ";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	    $row = $result->fetch_assoc();
			echo $row['ID'];
			echo ",";
			echo $row['userName'];
			echo ",";
			echo $row['firstName']." ".$row['surName'];			
			
	}
	
?>