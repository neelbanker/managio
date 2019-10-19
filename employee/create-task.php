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
	include "includes/tab.php"; ?>
<section id="content">
    <form id="create" action="includes/db-create-task.php" method="post" enctype="multipart/form-data">
    	<fieldset>
        	<h6>Create Task</h6>
            <div class="clearfix"></div>
            <input type="text" name="title" placeholder="Task Subject" required="required" maxlength="100" tabindex="1"/>
            <textarea name="detail" placeholder="Task Detail" tabindex="2"></textarea>
            <div class="leftcol">
            	<input type="text" value="" name="startDate" placeholder="Start Dates" required="required" id="from" tabindex="3"/>
                <input type="file" name="attachment" id="attachment" tabindex="5" />
                <p></p>
                <p>Upload File</p>
            </div>
            <div class="rightcol">
            	<input type="text" value="" name="endDate" placeholder="End Dates" required="required" id="to" tabindex="4" />
                <select name="receiverID" tabindex="6">
                	<option>To</option>
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
            </div>
        </fieldset>
        <input type="submit" value="Create" tabindex="7"/>
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