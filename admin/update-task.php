<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Task - Managio</title>
<?php include "includes/css.php"; ?>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
</script>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) 
{
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php";
	$ID = $_GET['ID'];
	$sql = "SELECT * FROM ems_task  WHERE ID = $ID";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc(); ?>
<section id="content">
    <form id="create" action="includes/db-update-task.php?ID=<?php echo $row['ID']; ?>" method="post" enctype="multipart/form-data">
    	<fieldset>
        	<h6>Edit Task</h6>
            <div class="clearfix"></div>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Task Subject" required="required" maxlength="100" tabindex="1"/>
                <textarea name="detail" placeholder="Task Detail" ><?php echo $row['detail']; ?></textarea>
            <div class="leftcol">
                <input type="text" value="<?php echo $row['startDate']; ?>" name="startDate" placeholder="Start Dates" required="required" id="from" tabindex="3"/>
                <select name="receiverID">
                <option>To</option>
                <?php 
						$sql1 = "SELECT * From ems_employee";
	  					$result1 = mysqli_query($conn,$sql1);
						if(mysqli_num_rows($result1) > 0)
						{
							while($row1 = $result1->fetch_assoc()) 
							{?>
                				<option value="<?php echo $row1['ID']; ?>"><?php echo $row1['surName']." ".$row1['firstName']; ?></option>
                    		<?php 
							} 
						}
						?>
						?>
            	</select>
            </div>
            <div class="rightcol">
            	<input type="text" value="<?php echo $row['endDate']; ?>" name="endDate" placeholder="End Dates" required="required" id="to" tabindex="4" />
            </div>
        </fieldset>
        <input type="submit" value="Edit" />
    </form>
</section>
<?php include "includes/footer.php" ?>
</body>
<?php
}
else {
	header('location: ../index.php');
}
?>
</html>