<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<?php	$ID = $_GET['ID'];
		$sql = "SELECT * FROM ems_event WHERE ID = $ID";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
				{?>
                    <section id="content">
                        <ul>
                            <li>
                                <div class="clearfix"></div>
                                <p id="title"><b><?php echo $row['title']; ?></b></p>
                                <p id="detail"><?php echo "Detail : ".$row['detail'];  ?></p>
                                <p id="date">Location : <?php echo $row['location'];  ?></p>
                                <p id="date">Start Date : <?php echo $row['startDate'];  ?></p>
                                <?php if($row['attachment'] != '../../attachment/event/') {?>
                                	<p id="attach"><a href="ems/<?php echo $row['attachment']; ?>">Download Attachment</a></p>
                                <?php } ?>
                                <a href="update-event.php?ID=<?php echo $row['ID']; ?>" class="button1">Edit</a>
                                <a href="includes/db-delete-event.php?ID=<?php echo $row['ID']; ?>" class="button1">Delete</a>
                             </li>
                         </ul>
                    </section>
				<?php
				}
			}
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