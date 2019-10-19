<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leave - Employee Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php";
	$xu = $_SESSION['userName'];
	$sql = "SELECT ID FROM ems_employee WHERE userName = '$xu'";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	$xi = $row['ID'];
	$sql = "SELECT * FROM ems_leave WHERE empID = '$xi'";
	$result = mysqli_query($conn, $sql); ?>
<section id="content">
    <ul>
    <?php if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{ ?>
                    <li>
                        <a href="leave-detail.php?ID=<?php echo $row['ID']; ?>">
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
		    <?php }
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