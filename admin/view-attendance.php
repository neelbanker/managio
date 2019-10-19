<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Subject - Managio</title>
<?php include "includes/css.php"; ?>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
	<ul>
		<br>
		<br>
		<center>
    <table id="salary" align="center">
        <tr>
            <th><b>Student Name</b></th>
            <th><b>Subject Name</b></th>
            <th><b>Subject Faculty</b></th>
            <th><b>Subject Attendance</b></th>
                <?php
	$sql = "SELECT * FROM attendance";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = $result->fetch_assoc())
		{ ?>
            <tr>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['subject_name']; ?></td>
                <td><?php echo $row['faculty_name']; ?></td>
                <td><?php echo $row['subject_attendance']; ?></td>
            </tr>
<?php	}
	} ?>
    </table>
</center>
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