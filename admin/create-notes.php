<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Note - Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<section id="content">
    <form id="create" action="includes/db-create-note.php" method="post">
    	<fieldset>
        	<h6>Create Note</h6>
            <div class="clearfix"></div>
            <select name="receiverID" style="width:50%">
            	<option value="">To</option>
                    <?php 
						$sql = "SELECT * From ems_employee ORDER BY surName ASC";
	  					$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result) > 0)
						{
							while($row = $result->fetch_assoc()) 
							{
								?>
                				<option value="<?php echo $row['ID']; ?>"><?php echo $row['surName']." ".$row['firstName']; ?></option>
                    			<?php
							}
						}
						?>
            	</select>
            <input type="text" name="title" placeholder="Note Subject" maxlength="100" required="required" />
            <textarea name="note" placeholder="Note" ></textarea>
        </fieldset>
		<input type="submit" value="Send" />
    </form>
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