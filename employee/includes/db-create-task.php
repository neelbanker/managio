<html>
<?php session_start();
	if($_SESSION['userName']) { ?>
    <head>
		<?php
		include '../../config/connectDB.php';
		include 'css.php'
		?>
        <script src="../js/popup.php"></script>
    </head>
    <body>
		<?php
		$x = $_SESSION['userName'];
		$sql = "SELECT ID From ems_employee where userName = '$x' ";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$title = $_POST["title"];
		$createDate = date("m/d/Y");
		$startDate = $_POST["startDate"];
		$endDate = $_POST["endDate"];	
		$detail = $_POST["detail"];
		$creatorID = $row['ID'];
		$receiverID = $_POST["receiverID"];
		$status = "Pending";
		$f = 1;
		
		//attachment
		$target_dir = "../../attachment/task/";
		$target_file = $target_dir . basename($_FILES["attachment"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
			
	$sql = ("INSERT INTO ems_task(title,createDate , startDate, endDate, detail, attachment, creatorID, receiverID, status, flagStatus, adminStatus) VALUES ('$title', '$createDate', '$startDate', '$endDate', '$detail', '$target_file', '$creatorID', '$receiverID', '$status', '$f', '$f')");
		$result = $conn->query($sql);
		
		if($result == true) { ?>
			
            <?php header('location: ../task.php');
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
</body>
</html>