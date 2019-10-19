<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event - Employee Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<?php $sql = "SELECT * FROM ems_event";
	  $result = mysqli_query($conn,$sql); ?>
<section id="content">
    <ul>
		<?php $count =mysqli_num_rows($result);
			if($count > 0){ 
				while($row = $result->fetch_assoc()) { ?>
        			<li>
                        <a href="event-detail.php?ID=<?php echo $row['ID']; ?>">
                            <div class="sub">
                                <p><b><?php echo $row['title']; ?></b></p>
                            </div>
                            <div class="dicription">
                                <p><?php echo $row['detail']; ?></p>
                            </div>
                            <div class="date">
                                <p>Event Date</p>
                                <p><?php echo $row['startDate']; ?></p>
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