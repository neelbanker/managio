<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task - Managio</title>
<?php include "includes/css.php" ?>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php"; 
	include "includes/header.php";
	include "includes/tab.php";
	$ID = $_GET['ID'];
	$sql = "SELECT * FROM ems_task WHERE ID = $ID";
	$result = mysqli_query($conn, $sql); ?>
    <section id="content">
		<ul>
    <?php	if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{?>	
					<li>
						<div class="<?php echo $row['status']; ?>">
							<p><?php echo $row['status']; ?></p>
						</div>
                        <div class="clearfix"></div>
                        <p id="title"><b><?php echo $row['title']; ?></b></p>
                        <p id="detail"><?php echo "Detail : ".$row['detail'];  ?></p>
                        <p id="date">Start Date : <?php echo $row['startDate'];  ?></p>
                        <p id="date">End Date : <?php echo $row['endDate'];  ?></p>
                        <?php if($row['attachment'] != '../../attachment/task/') {?>
                        	<p id="attach"><a href="ems/<?php echo $row['attachment']; ?>" style="margin-bottom:15px;">Download Attachment</a></p>
                        <?php } ?>
                        <p id="assign">Assigned To : <?php $sql1 = "SELECT * From ems_employee WHERE ID = ".$row['receiverID'];
															$result1 = mysqli_query($conn,$sql1);
															$row1 = $result1->fetch_assoc();
															echo $row1['surName'].'&nbsp;'.$row1['firstName'];?> </p>
                        <a href="update-task.php?ID=<?php echo $row['ID']; ?>" class="button1">Edit</a>
                        <a href="includes/db-delete-task.php?ID=<?php echo $row['ID']; ?>" class="button1">Delete</a>
					 </li>
				<?php
                }
            } ?>
		</ul>
	</section>
	<?php include "includes/footer.php";
} 
else {
	header('location: ../index.php');
}
?>
</body>
</html>