<?php
	include "../config/connectDB.php";
	
	$sql = "SELECT * FROM ems_event";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo $row['title'];
			echo ";";
			echo $row['detail'];
			echo ";";
			echo $row['location'];
			echo ";";
			echo $row['startDate'];
			echo ";";
				$ID = $row['creatorID'];
				$sql1 = "SELECT * From ems_employee WHERE ID = '$ID'";
				$result1 = mysqli_query($conn, $sql1);
				$row1 = $result1->fetch_assoc();
			echo $row1['surName'].' '.$row1['firstName'];
			echo ";;";			
		}	
	}
	
?>