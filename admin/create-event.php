<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event - Managio</title>
<?php include "includes/css.php"; ?>
<!------------------------------------------------------------------------------date picker------------------------------------------------------------------------------------><script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({
showButtonPanel: true
});
});
</script>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
    <form id="create" action="includes/db-create-event.php" method="post" enctype="multipart/form-data">
    	<fieldset>
        	<h6>Create Event</h6>
            <div class="clearfix"></div>
            <input type="text" name="title" placeholder="Event Subject" required="required" />
            <textarea name="detail" placeholder="Event Detail"></textarea>
            <input type="text" name="location" placeholder="Event Location" required="required" />
            <input type="file" name="attachment" id="attachment" multiple="multiple"/>
            <div class="leftcol">
            	<input type="text" value="" class="some_class" name="startDate" placeholder="Start Dates" id="datepicker"/>
            </div>
        </fieldset>
        <input type="submit" value="Create" />
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