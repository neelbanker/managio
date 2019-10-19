<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leave - Employee Management System</title>
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
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<section id="content">
    <form id="create" action="includes/db-create-leave.php" method="post"  enctype="multipart/form-data">
    	<fieldset>
        	<h6>Apply For Leave</h6>
            <div class="clearfix"></div>
            <input type="text" name="title" placeholder="Leave Subject" required="required" maxlength="100" />
            <select name="leaveType">
                <option selected="selected">Half Day Leave</option>
                <option>full Day Leave</option>
                <option>Sick Leave</option>
            </select>
            <textarea name="leaveMessage" placeholder="Message"></textarea>
            <div class="leftcol">
            	<input type="text" value="" name="leaveStartDate" placeholder="Start Dates" required="required" id="from"/>
	            <input type="file" name="attachment" id="attachment" multiple="multiple"/>
            </div>
            <div class="rightcol">
            	<input type="text" value="" name="leaveEndDate" placeholder="End Dates" required="required" id="to"/>
            	<select name="receiverID" tabindex="6">
                	<option>To</option>
                    <?php
						$sql = "SELECT * From ems_employee WHERE role = 1";
	  					$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result) > 0)
						{
							while($row = $result->fetch_assoc())
							{ ?>
                				<option value="<?php echo $row['ID']; ?>"><?php echo $row['surName']." ".$row['firstName']; ?></option>
                    		<?php
							}
						}
						?>
            	</select>
            </div>
        </fieldset>
        <input type="submit" value="Send" />
    </form>
</section>
<?php include "includes/footer.php"; ?>
</body>
<?php 
} 
else {
	header('location: ../index.php');
}
?>
</html>