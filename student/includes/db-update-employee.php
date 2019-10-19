<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$ID = $_GET['ID'];
		$gender = $_POST["gender"];
		$dateOfBirth = $_POST["dateOfBirth"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$countary = $_POST["countary"];
		$email = $_POST["email"];
		$phoneNumber = $_POST["phoneNumber"];
		$startDate = $_POST["startDate"];
		$panNumber = $_POST["panNumber"];
		$pfNumber = $_POST["pfNumber"];
		$adharNumber = $_POST["adharNumber"];
		$f = 1;
		
		// Atttachment
		$target_dir = "../../attachment/profile/";
		$target_file = $target_dir . basename($_FILES["imgPath"]["name"]);
		if($target_dir == $target_file) {
			$sql = "SELECT * From ems_employee WHERE ID = '$ID'";
			$result = mysqli_query($conn, $sql);
			$row = $result->fetch_assoc();
			$target_file = $row['imgPath'];
		}
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["imgPath"]["tmp_name"], $target_file)) {
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		
		$sql = "UPDATE ems_employee SET gender='$gender', dateOfBirth='$dateOfBirth', address='$address', city='$city', state='$state', countary='$countary', email='$email', phoneNumber='$phoneNumber', startDate='$startDate', panNumber='$panNumber', pfNumber='$pfNumber', adharNumber='$adharNumber', imgPath = '$target_file' WHERE ID=$ID";
		
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../profile.php?ID='.$ID);
		}
		else {
			die("Connection Failed : ".$conn ->connect_error);
		}
	}
	else {
		header('location: ../../index.php');
	} 
?>