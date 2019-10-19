<?php
	include "../config/connectDB.php";
	
	$xu = $_REQUEST['ID'];
	$sql = "SELECT * FROM ems_leave WHERE empID = '$xu'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo $row['leaveStatus'];
			echo ";";
			echo $row['title'];
			echo ";";
			echo $row['leaveMessage'];
			echo ";";
			echo $row['leaveType'];
			echo ";";
			echo $row['leaveSubmissionDate'];
			echo ";";
			echo $row['leaveStartDate'];
			echo ";";
			echo $row['leaveEndDate'];
			echo ";";
			echo str_replace("../../", "https://managioportal.000webhostapp.com/managio/",$row['leaveAttachment']);
			echo ";;";			
		}	
	}
	
?>