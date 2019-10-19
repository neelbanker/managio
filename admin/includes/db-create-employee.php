<?php
	session_start();
	include '../../config/connectDB.php';
	if($_SESSION['userName']) {
		$userName = $_POST["userName"];
		$uPassword = $_POST["uPassword"];
		$conformPassword = $_POST["conformPassword"];
		$surName = $_POST["surName"];
		$firstName = $_POST["firstName"];
		$middelName = $_POST["middelName"];
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
		
		if($uPassword == $conformPassword) {
			$sql = ("INSERT INTO ems_employee(userName, uPassword, imgPath, surName, firstName, middelName, gender, dateOfBirth, address, city, state, countary, email, phoneNumber, startDate, panNumber, pfNumber, adharNumber, role) VALUES('$userName', '$uPassword', '$target_file', '$surName', '$firstName', '$middelName', '$gender', '$dateOfBirth', '$address', '$city', '$state', '$countary', '$email', '$phoneNumber', '$startDate', '$panNumber', '$pfNumber', '$adharNumber',0)");
			$result = $conn->query($sql);
			if($result == true)
			{
				header('location: ../employee.php');
			}
		}
		else {
			echo "Password is not valid.";
		}
	}
	else {
		header('location: ../../index.php');
	} 
?>