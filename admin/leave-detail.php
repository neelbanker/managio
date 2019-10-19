<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leave - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
    <section id="content">
    	<ul>
			<?php	$ID = $_GET['ID'];
			$xu = $_SESSION['userName'];
	$sql = "SELECT ID FROM ems_employee WHERE userName = '$xu'";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	$xi = $row['ID'];
			$sql = "SELECT * FROM ems_leave WHERE ID = '$ID'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
					{?>
						<li>
                        	<div class="clearfix"></div>
                            <div class="<?php echo $row['leaveStatus']; ?>">
                                    <p><?php echo $row['leaveStatus']; ?></p>
                            </div>
                            <p id="title"><b><?php echo $row['title']; ?></b></p>
                            <p id="detail">Message : <?php echo $row['leaveMessage']; ?></p>
                            <p id="detail">Leave Type : <?php echo $row['leaveType'];  ?></p>
                            <p id="date">Subbmition Date : <?php echo $row['leaveStartDate'];  ?></p>
                            <p id="date">Start Date : <?php echo $row['leaveStartDate'];  ?></p>
                            <p id="date">End Date : <?php echo $row['leaveEndDate'];  ?></p>
                            <?php if($row['leaveAttachment'] != '../../attachment/leave/') {?>
                            	<p id="attach"><a href="ems/<?php echo $row['leaveAttachment']; ?>"><p id="attach">Download Attachment</p></a></p>
                            <?php }
                            if($row['empID'] == $xi){ 
                            	if($row['leaveStatus'] == "Apply"){ ?>
								<a href="includes/db-delete-leave.php?ID=<?php echo $row['ID']; ?>" class="button1" >Cancel</a>
                            <?php } 
							}
							elseif($row['receiverID'] == $xi) {?>
                                <a href="includes/db-leave-detail.php?ID=<?php echo $row['ID']; ?>&status=Reject" class="button1">Reject</a>
                                <a href="includes/db-leave-detail.php?ID=<?php echo $row['ID']; ?>&status=Approve" class="button1">Approve</a>
                            <?php } ?>
                         </li>
				<?php
				}
			}
		?>
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