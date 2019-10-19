<?php
	include "../config/connectDB.php";
    $a=$_REQUEST['firstName'];
	$b=$_REQUEST['subject_name'];
	$c=$_REQUEST['faculty_name'];
	$subject_attendance=1;

    $sql2=("INSERT INTO attendance(student_name,subject_name,faculty_name,subject_attendance) VALUES('$a','$b','$c','$subject_attendance')");
    $result2=$conn->query($sql2);
	if($result2 == true)
			{
				echo "success";
			}
?>