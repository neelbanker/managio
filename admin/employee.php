<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task - MANAGIO</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php" ?>
<?php include "includes/header.php" ?>
<?php include "includes/tab.php" ?>
<?php	$sql = "SELECT * FROM ems_employee ORDER BY ID DESC";
		$result = mysqli_query($conn, $sql); ?>
<section id="content">
    <ul>
    <?php if(mysqli_num_rows($result) > 0)
			{
				while($row = $result->fetch_assoc())
				{if($row['role'] == 2){}
                else{ ?>
                    <li>
                        <a href="employee-detail.php?ID=<?php echo $row['ID']; ?>">
                        	<table id="emp">
                            	<tr>
                                	<td rowspan="6" width="110" class="pd0"><img src="ems/<?php echo $row['imgPath']; ?>" /></td>
                                	<td colspan="3" class="name"><?php echo $row['surName'] ." ". $row['firstName'] ." ". $row['middelName'] ; ?></td>
                                </tr>
                                <tr>
                                    <td width="110">User Name</td>
                                    <td width="1">:</td>
                                    <td><?php echo $row['userName']; ?></td>
                                    <td></td>
                                <tr>
                                </tr>
                                    <td>Date of Birth</td>
                                    <td>:</td>
                                    <td><?php echo $row['dateOfBirth']; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<td>Contact No.</td>
                                    <td>:</td>
                                    <td><?php echo $row['phoneNumber']; ?></td>
                                    <td></td>
                                </tr>
                            </table>
                        </a>
                    </li>
		    <?php }}
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