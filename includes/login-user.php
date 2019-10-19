<?php
	session_start();
	include "../config/connectDB.php";
	$email = $_POST['email'];
	$uPassword = $_POST['uPassword'];
	$sql = "SELECT ID , userName, uPassword, role FROM ems_employee WHERE userName = '$email' and uPassword = '$uPassword'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($row = $result->fetch_assoc())
		{
			$_SESSION['userName'] = $row['userName'];
			$_SESSION['ID'] = $row['ID'];

			if($row['role'] == 0){
				header('location: ../employee/dashboard.php');
			}
			else if($row['role'] == 2){
				header('location: ../student/dashboard.php');
			}
			else
			{
				header('location: ../admin/dashboard.php');
			}
		}
	}
	else {
		echo "<script> alert('Failed')</script>";

		header('location: ../index.php');

	}
?>