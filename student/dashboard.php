<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - MANAGIO</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
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
            $sql = "SELECT * FROM ems_task WHERE receiverID = $xi ORDER BY ID DESC LIMIT 5";
            $result = mysqli_query($conn, $sql); ?>
        <?php	if(mysqli_num_rows($result) > 0)
                { ?>
                	
                    <?php
                    while($row = $result->fetch_assoc())
                    { ?>
                        <li>
                            <a href="task-detail.php?ID=<?php echo $row['ID']; ?>">
                                <div class="type">
                                    <p><?php echo "Task"; ?></p>
                                </div>
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
                } ?>
    </ul>
    <ul>
        <?php	
            $sql = "SELECT * FROM ems_event ORDER BY ID DESC LIMIT 5 ";
            $result = mysqli_query($conn, $sql); ?>
        <?php	if(mysqli_num_rows($result) > 0)
                { ?>
					
                    <?php
					while($row = $result->fetch_assoc())
                    { ?>
                        <li>
                            <a href="#">
                                <div class="type">
                                    <p><?php echo "Event"; ?></p>
                                </div>
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
        <?php	 }
               } ?>
    </ul>
    <ul>
      	<?php	
			$sql = "SELECT * FROM `ems_notes` WHERE createrID = '$xi' OR receiverID = '$xi' ORDER BY ID DESC";
			$result = mysqli_query($conn, $sql); ?>
    	<?php	if(mysqli_num_rows($result) > 0)
				{ ?>
					
					<?php
                    while($row = $result->fetch_assoc())
					{ ?>
                    	<li>
                        	<a href="#">
                        		<div class="type">
                                	<p><?php echo "Note"; ?></p>
                            	</div>
                            	<div class="sub">
                                	<p><b><?php echo $row['title']; ?></b></p>
                            	</div>
                            	<div class="dicription">
                                	<p><?php echo $row['note']; ?></p>
                            	</div>
			            	</a>
                    	</li>
		    <?php }
			} ?>
    </ul>
    <ul>
        <?php	
        $xu = $_SESSION['userName'];
		$sql1 = "SELECT ID FROM ems_employee WHERE userName = '$xu'";
		$result1 = mysqli_query($conn, $sql1);
		$row = $result1->fetch_assoc();
		$ID=$row['ID'];

			$sql = "SELECT * FROM ems_leave WHERE empID= '$ID' ORDER BY ID DESC LIMIT 5 ";
			$result = mysqli_query($conn, $sql); ?>
    	<?php	if(mysqli_num_rows($result) > 0)
				{ ?>
    				
                    <?php
					while($row = $result->fetch_assoc())
					{ ?>
                    	<li>
                        	<a href="#">
                            	<div class="type">
                                    <p><?php echo "Leave"; ?></p>
                                </div>
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