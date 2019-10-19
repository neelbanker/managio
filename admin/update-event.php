<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event - Managio</title>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({
showButtonPanel: true
});
});
</script>
<?php include "includes/css.php" ?>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) 
{	include "../config/connectDB.php";
	include "includes/header.php";
	include "includes/tab.php";
	$ID = $_GET['ID'];
	$sql = "SELECT * FROM ems_event WHERE ID = $ID";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc() ?>
<section id="content">
    <form id="create" action="includes/db-update-event.php?ID=<?php echo $row['ID']; ?>" method="post" enctype="multipart/form-data">
    	<fieldset>
        	<h6>Edit Event</h6>
            <div class="clearfix"></div>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Event Subject" required="required" />
            <textarea name="detail" value="" placeholder="Event Detail"><?php echo $row['detail']; ?></textarea>
            <input type="text" name="location" value="<?php echo $row['location']; ?>" placeholder="Leave Location" required="required" />
            <div class="leftcol">
                <input type="text" value="<?php echo $row['startDate']; ?>" name="startDate" placeholder="Start Dates"  id="datepicker" tabindex="9"/>
            </div>
        </fieldset>
        <input type="submit" value="Update" />
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