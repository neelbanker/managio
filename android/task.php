<?php
	include "../config/connectDB.php";
	
	$xu = $_REQUEST['ID'];
	$sql = "SELECT * FROM ems_task WHERE receiverID = '$xu'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo $row['status'];
			echo ";";
			echo $row['title'];
			echo ";";
			echo $row['detail'];
			echo ";";
			echo $row['startDate'];
			echo ";";
			echo $row['endDate'];
			echo ";";
			echo str_replace("../../", "https://managioportal.000webhostapp.com/managio/",$row['attachment']);
			echo ";;";			
		}	
	}
	
?>