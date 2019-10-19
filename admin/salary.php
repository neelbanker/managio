<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salary - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
	<form id="create" action="includes/db-create-salary.php" method="post">
    	<fieldset>
        	<h6>Salary</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
            <select name="empID">
                <option value="">Select Employee</option>
                <?php 
                    $sql = "SELECT * From ems_employee";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {?>
                            <option value="<?php echo $row['ID']; ?>"><?php echo $row['surName']." ".$row['firstName']; ?></option>
                        <?php 
                        } 
                    }
                    ?>
            </select>
            <select name="type">
                <option>Select Type</option>
                <option>Per Month</option>
                <option>Per Week</option>
                <option>Per Day</option>
                <option>per Hour</option>
            </select>
            </div>
            <div class="rightcol">
	        <input type="text" name="amount" placeholder="Salary Amount" required="required" />
            <input type="text" name="tax" placeholder="Salary Tax(in %)" maxlength="2" />
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