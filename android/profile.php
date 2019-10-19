<?php
	include "../config/connectDB.php";
	
	$xu = $_REQUEST['ID'];
	$sql = "SELECT * FROM ems_employee WHERE receiverID = '$xu'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		$row = $result->fetch_assoc();
			echo str_replace("../../", "https://managioportal.000webhostapp.com/managio/",$row['imgPath']);		
	}
	
?>