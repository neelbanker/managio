<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php";
	$xu = $_SESSION['userName'];
	$sql = "SELECT ID FROM ems_employee WHERE userName = '$xu'";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc();
	$xi = $row['ID'];
	$sql = "SELECT * FROM ems_task WHERE creatorID = $xi ORDER BY ID DESC";
	$result = mysqli_query($conn, $sql);
?>    
<section id="content">
    <ul>
    <?php if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{ ?>
                    <li>
                        <a href="task-detail.php?ID=<?php echo $row['ID']; ?>">
                            <div class="<?php echo $row['status']; ?>">
                                    <p><?php echo $row['status']; ?></p>
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
                            <div class="dicription">
                            	<?php $ID = $row['receiverID'];
									  $sql1 = "SELECT * From ems_employee WHERE ID='$ID'";
									  $result1 = mysqli_query($conn, $sql1);
									  $row1 = $result1->fetch_assoc();
								?>
                                <img src="ems/<?php echo $row1['imgPath']; ?>" style="border-radius:100%; height:50px; width:50px;" alt="" title="<?php echo $row1['surName'].'&nbsp;'.$row1['firstName'];?>" />
                            </div>
                        </a>
                    </li>
		    <?php }
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