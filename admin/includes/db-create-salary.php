<?php
	session_start();
	if($_SESSION['userName']) {
		include '../../config/connectDB.php';
		$empID = $_POST['empID'];
		$amount = $_POST['amount'];
		$f = 1;
		$tax = $_POST['tax'];
		$type = $_POST['type'];
		$date = date('Y/m/d H:i');
		$salaryAfterDeduction = ($amount - (($amount*$tax)/100));
		
		$sql = ("INSERT INTO ems_salary(empID, amount, flagStatus, adminStatus, tax, type, date, salaryAfterDeduction) VALUES('$empID', '$amount', '$f', '$f', '$tax', '$type', '$date', '$salaryAfterDeduction')");
		$result = $conn->query($sql);
		if($result == true) {
			header('location: ../salary-log.php');
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