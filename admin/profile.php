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
	include "includes/tab.php"; ?>
	<section id="content">
		<ul>
	<?php
    	$ID = $_GET['ID'];
		$sql = "SELECT * FROM ems_employee WHERE ID = $ID ORDER BY ID DESC";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
				{?>	
                    <li>
                        <form id="empdatail" action="modify-profile.php">
                            <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>" />
                            <fieldset>
                                <h6>Personal Information</h6>
                                <div class="clearfix"></div>
                                <table id="emp">
                                    <tr>
                                        <td colspan="3" class="name"><?php echo $row['surName'] ." ". $row['firstName'] ." ". $row['middelName'] ; ?></td>
                                        <td rowspan="6" width="110" class="pd0"><img src="ems/<?php echo $row['imgPath']; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td width="110">User Name</td>
                                        <td width="1">:</td>
                                        <td><?php echo $row['userName']; ?></td>
                                    <tr>
                                    </tr>
                                        <td>Date of Birth</td>
                                        <td>:</td>
                                        <td><?php echo $row['dateOfBirth']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?php echo $row['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td><?php echo $row['state']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Countary</td>
                                        <td>:</td>
                                        <td><?php echo $row['countary']; ?></td>
                                    </tr>
                               </table>
                            </fieldset>
                            <fieldset>
                                <h6>Contact Information</h6>
                                <div class="clearfix"></div>
                                <div class="leftcol">
                                    <table>
                                        <tr>
                                            <td>E-Mail</td>
                                            <td>:</td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="rightcol">
                                    <table>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>:</td>
                                            <td><?php echo $row['phoneNumber']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset>
                                <h6>Official Information</h6>
                                <div class="clearfix"></div>
                                <div class="leftcol">
                                    <table>
                                        <tr>
                                            <td>Date of Joining</td>
                                            <td>:</td>
                                            <td><?php echo $row['startDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role of Employee</td>
                                            <td>:</td>
                                            <td><?php echo $row['role']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="rightcol">
                                    <table>
                                        <tr>
                                            <td>P F Number</td>
                                            <td>:</td>
                                            <td><?php echo $row['pfNumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pan Number</td>
                                            <td>:</td>
                                            <td><?php echo $row['panNumber']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Adhar Number</td>
                                            <td>:</td>
                                            <td><?php echo $row['adharNumber']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                            <input type="submit" class="button1" value="Edit" />
                       </form>
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