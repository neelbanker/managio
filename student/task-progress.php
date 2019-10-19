<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task - MANAGIO</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<?php	$ID = $_GET['ID'];
		$status = $_GET['status'];
		
		if($status == "Start") {
			$status = "InProgress";
		}
		elseif($status == "Finish") {
			$status = "Stop";
		}
		
		$flagStatus = 1;
		$sql = "UPDATE ems_task SET status='$status', flagStatus = '$flagStatus', adminStatus= '1' WHERE ID=$ID";
		$result = mysqli_query($conn, $sql);
		header("location: task-detail.php?ID=".$ID);
		?>
<?php include "includes/footer.php"; ?>
<?php 
} 
else {
	header('location: ../index.php');
}
?>
</body>
</html>