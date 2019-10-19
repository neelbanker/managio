<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
	<form id="create" action="includes/db-create-subject.php" method="post">
    	<fieldset>
        	<h6>Create Subject</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
            <select name="sub_faculty">
                <option value="">Select Faculty</option>
                <?php 
                    $sql = "SELECT * FROM ems_employee WHERE role=0 ";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {?>
                            <option value="<?php echo $row['firstName'].' '.$row['surName']; ?>"><?php echo $row['surName']." ".$row['firstName']; ?></option>
                        <?php 
                        } 
                    }
                    ?>
            </select>
            
            </div>
            <div class="rightcol">
	        <input type="text" name="sub_name" placeholder="Enter Subject" required="required" />
            
        	</div>
        </fieldset>
        <input type="submit" value="Create" />
    </form>
</section>
<?php include "includes/footer.php";
} 
else {
	header('location: ../index.php');
}
?>
</body>
</html>