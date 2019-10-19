<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Notification - MANAGIO</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<?php	$xu = $_SESSION['userName'];
		$sql = "SELECT ID FROM ems_employee WHERE userName = '$xu'";
		$result = mysqli_query($conn, $sql);
		$row = $result->fetch_assoc();
		$xi = $row['ID'];
		$f = 1; 
		?>
<section id="content">
    <ul>
        
        <?php	
            $sql = "SELECT * FROM ems_task WHERE receiverID = '$xi' and flagStatus = $f";
            $result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{ ?>
					<li>
						<div class="close">
							<div class="type">
								<p><?php echo "Task"; ?></p>
							</div>
							<a href='includes/db-update-notification.php?ID=<?php echo $row['ID']; ?>&type=Task'>
								<p>X</p>
							</a>
						</div>
						<a href="task-detail.php?ID=<?php echo $row['ID']; ?>">
							<div class="sub">
								<p><b><?php echo $row['title'];  ?></b></p>
							</div>
							<div class="dicription">
								<p><?php echo $row['detail'];  ?></p>
							</div>
							<div class="date">
								<p>End Date</p>
								<p><?php echo $row['endDate'];  ?></p>
							</div>
							<div class="date">
								<p>Start Date</p>
								<p><?php echo $row['startDate'];  ?></p>
							</div>
						</a>
					</li>
		<?php 	}
			}
			else 
			{
				echo "<li>"."You Don't Have New Task notification"."</li>";
			}  ?>
    </ul>
    <ul>
        
        <?php	
            $sql = "SELECT * FROM ems_event WHERE flagStatus = $f ";
            $result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
            {
                while($row = $result->fetch_assoc())
                { ?>
                    <li>
                        <div class="close">
							<div class="type">
								<p><?php echo "Event"; ?></p>
							</div>
							<a href="includes/db-update-notification.php?ID=<?php echo $row['ID']; ?>&type=Event">
								<p>X</p>
							</a>
						</div>
                        <a href="#">
                            <div class="sub">
                                <p><b><?php echo $row['title']; ?></b></p>
                            </div>
                            <div class="dicription">
                                <p><?php echo $row['detail']; ?></p>
                            </div>
                            <div class="date">
                                <p>Start Date</p>
                                <p><?php echo $row['startDate']; ?></p>
                            </div>
                        </a>
                    </li>
    <?php		}
			}
			else 
			{
				echo "<li>"."You Don't Have New Event notification"."</li>";
			}  ?>
    </ul>
	<ul>
		
		<?php	
			$sql = "SELECT * FROM ems_notes WHERE receiverID = '$xi' and flagStatus = $f ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{ ?>
                    <li>
                    	<div class="close">
							<div class="type">
								<p><?php echo "Note"; ?></p>
							</div>
		                    	<a href='includes/db-update-notification.php?ID=<?php echo $row['ID']; ?>&type=Note'>
									<p>X</p>
								</a>
						</div>
                        <a href="#">
                            <div class="sub">
                                <p><b><?php echo $row['title']; ?></b></p>
                            </div>
                            <div class="dicription">
                                <p><?php echo $row['note']; ?></p>
                            </div>
			            </a>
                    </li>
		    <?php }
			}
			else 
			{
				echo "<li>"."You Don't Have New Note notification"."</li>";
			}  ?>
    </ul>
    <ul>
    	
        <?php	
			$sql = "SELECT * FROM ems_leave WHERE empID='$xi' and flagStatus = $f ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{ ?>
					<li>
						<div class="close">
							<div class="type">
								<p><?php echo "Leave"; ?></p>
							</div>
		                    	<a href='includes/db-update-notification.php?ID=<?php echo $row['ID']; ?>&type=Leave'>
									<p>X</p>
								</a>
						</div>
						<a href="#">
							<div class="sub">
								<p><b><?php echo $row['title']; ?></b></p>
							</div>
							<div class="dicription">
								<p><?php echo $row['leaveMessage']; ?></p>
							</div>
							<div class="date">
								<p>Start Date:</p>
								<p><?php echo $row['leaveStartDate']; ?></p>
							</div>
							<div class="date">
								<p>End Date</p>
								<p><?php echo $row['leaveEndDate']; ?></p>
							</div>
						</a>
					</li>
		<?php 	}
			}
			else 
			{
				echo "<li>"."You Don't Have New Leave notification"."</li>";
			} ?>
    </ul>
</section>
<?php include "includes/footer.php"; ?>
<?php 
} 
else {
	header('location: ../index.php');
}
?>
</body>
</html>