<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salary Log - Managio</title>
<?php include "includes/css.php"; ?>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
	<ul>
    <table id="salary">
        <tr>
            <th><b>Employee Name</b></th>
            <th><b>Type</b></th>
            <th><b>Salary Amount</b></th>
            <th><b>Tax</b></th>
            <th><b>Salary After Deduction</b></th>
    <?php
	$sql = "SELECT * FROM ems_salary ORDER BY ID DESC";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{ ?>
            <tr>
                <td><?php	$empID = $row['empID'];
                    $sql1 = "SELECT surName, firstName, middelName FROM ems_employee WHERE ID = $empID";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = $result1->fetch_assoc();
                    echo $row1['surName']." ".$row1['firstName']." ".$row1['middelName'];
                ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['tax']; ?></td>
                <td><?php echo $row['salaryAfterDeduction']; ?></td>
            </tr>
<?php	}
	} ?>
    </table>
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