<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile - Managio</title>
<!---------------------------------------------------------------------------------date picker-------------------------------------------------------------------------------------->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({
showButtonPanel: true
});
});
</script>
<script>
$(function() {
$( "#datepicker1" ).datepicker({
showButtonPanel: true
});
});
</script>
<script>
$(document).ready(function(e) {
	$('#chp').click(function(e) {
		e.preventDefault();
		$('#imgPath').css("visibility","visible");
	});
});
</script>
<!-----------------------------------------------------------------------Number Validation------------------------------------------------------------------------------------------>
<script>
function number(obj)
{
if(obj.value != obj.value.replace(/[^0-9]/g,""))
{
   obj.value = obj.value.replace(/[^0-9]/g,"");
    obj.focus();
  }
}
</script>
 <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<?php include "includes/css.php" ?>
</head>
<body class="bgback">
<?php if($_SESSION['userName']) {
	include "includes/header.php";
	include "includes/tab.php";
	$ID = $_GET['ID'];
	$sql = "SELECT * FROM ems_employee Where ID = $ID";
	$result = mysqli_query($conn, $sql);
	$row = $result->fetch_assoc() ?>
<section id="content">
	<h3>Edit Employee</h3>
    <form id="create" method="post" action="includes/db-update-employee.php?ID=<?php echo $row['ID']; ?>" enctype="multipart/form-data">
    	 <fieldset>
            <h6>log In</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
                <input type="email" name="userName" value="<?php echo $row['userName']; ?>" disabled="disabled" />
            </div>
            <div class="rightcol">
                <a href="../password-reset.php?ID=<?php echo $row['ID']; ?>" class="button" style="width:90%;">Change Password</a>
            </div>
		</fieldset>
    	<fieldset>
            <h6>Personal Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
                <img src="ems/<?php echo $row['imgPath']; ?>" style="width:15%; height:80px; margin:10px; border-radius:100%; float:left;" />
                <a href="#" class="button" style="width:50%; margin:5%;" id="chp">Change Photo</a>
            	<input type="file" name="imgPath" value="<?php echo $row['imgPath']; ?>" id="imgPath" tabindex="8" style="visibility:hidden"/>
                <input type="text" name="surName" value="<?php echo $row['surName']; ?>" disabled="disabled" />
                <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" disabled="disabled" />
                <input type="text" name="middelName" value="<?php echo $row['middelName']; ?>" disabled="disabled" />
                <p class="gender"><input type="radio" name="gender" value="Male" <?php if($row['gender'] == "Male"){ ?>checked="checked" <?php } ?>/> Male</p>
                <p class="gender"><input type="radio" name="gender" value="Female"  <?php if($row['gender'] == "Female"){ ?>checked="checked" <?php } ?> /> Female</p>
            </div>
            <div class="rightcol">
                <input type="text" value="<?php echo $row['dateOfBirth']; ?>" name="dateOfBirth" placeholder="Date of Birth"  id="datepicker" tabindex="9"/>
                <select name="countary" tabindex="10" >
                	<option selected="selected"><?php echo $row['countary']; ?></option>
                    <?php	$sql1 = "SELECT * FROM ems_countries";
							$result1 = mysqli_query($conn,$sql1);
							if(mysqli_num_rows($result1) > 0)
							{
								while($row1 = $result1->fetch_assoc())
								{ ?>
                                	<option><?php echo $row1['countryName']; ?></option>
								<?php
								}
							} ?>
                </select>
                <select name="state" tabindex="10">
                	<option selected="selected"><?php echo $row['state']; ?></option>
                    <?php	$sql2 = "SELECT * FROM ems_states ORDER BY stateName ASC";
							$result2 = mysqli_query($conn,$sql2);
							if(mysqli_num_rows($result2) > 0)
							{
								while($row2 = $result2->fetch_assoc())
								{ ?>
                                	<option><?php echo $row2['stateName'];?></option>
								<?php
								}
							} ?>
                </select>
                <select name="city" class="cities" id="cityId" tabindex="11">
                	<option selected="selected"><?php echo $row['city']; ?></option>
                    <?php	$sql3 = "SELECT * FROM ems_cities ORDER BY cityName ASC";
							$result3 = mysqli_query($conn,$sql3);
							if(mysqli_num_rows($result3) > 0)
							{
								while($row3 = $result3->fetch_assoc())
								{ ?>
                                	<option><?php echo $row3['cityName'];?></option>
								<?php
								}
							} ?>
                </select>
                <textarea name="address" placeholder="Address" ><?php echo $row['address']; ?></textarea>
             </div>
		</fieldset>
        <fieldset>
            <h6>Contact Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
            	<input type="email" name="email" value="<?php echo $row['email']; ?>" />
            </div>
            <div class="rightcol">
                <input type="text" name="phoneNumber" value="<?php echo $row['phoneNumber']; ?>" />
            </div>
		</fieldset>
        <fieldset>
            <h6>Official Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
                <input type="text" value="<?php echo $row['startDate']; ?>" name="startDate" placeholder="Start Date"  id="datepicker1" tabindex="9"/>
                <select name="role">
                	<option><?php if($row['role'] == 1)
									{ echo "Employee"; 
									}
									elseif($row['role'] == 0)
									{
										echo "Admin"; 
									} ?></option>
                    <option value="0">Employee</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="rightcol">
            	<input type="text" name="pfNumber" value="<?php echo $row['pfNumber']; ?>" />
                <input type="text" name="panNumber" value="<?php echo $row['panNumber']; ?>" />
                <input type="text" name="adharNumber" value="<?php echo $row['adharNumber']; ?>" />
            </div>
		</fieldset>
        <input type="submit" value="Save" />
	</form>
</section>
<?php include "includes/footer.php";
}
else {
	header('location: ../index.php');
} ?>
</body>
</html>