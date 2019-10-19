<?php	session_start();
		if($_SESSION['userName']) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="In this PHP tutorial, you will learn how to upload multiple images using PHP and Mysql. Mysql  is used to store uploaded Image. You can display that stored Image in frontend."/>
<meta name="keywords" content="Free Image Upload, Image, Images, Image Upload, Upload Photos, upload pictures, free images, file, php, php tutorial, sql, mysql, Javascript, Jquery"/>
<title>Create Student - Managio</title>
<?php	include "includes/css.php"; ?>
<!------------------------------------------------------------------------------date picker------------------------------------------------------------------------------------>
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
<!----------------------------------------------------------------------------------Number Validation-------------------------------------------------------------------------->
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
</head>
<body class="bgback">
<?php include "includes/header.php";
	include "includes/tab.php"; ?>
<section id="content">
	<h3>Create Student</h3>
    <form id="create" method="post" action="includes/db-create-student.php" enctype="multipart/form-data">
    	 <fieldset>
            <h6>Login Credentials</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
                <input type="email" name="userName" placeholder="UserName@managio.com" maxlength="100" autofocus required="required" tabindex="1"/>
            </div>
            <div class="rightcol">
                <input type="password" name="uPassword" placeholder="Password" id="txtPassword" maxlength="100" required="required" tabindex="2"/>
                <input type="password" name="conformPassword"  placeholder="Confirm Password" id="txtConfirmPassword"  tabindex="3"/>
            </div>
		</fieldset>
    	<fieldset>
            <h6>Personal Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
                <input type="text" name="surName" placeholder="Surname" tabindex="4"/>
                <input type="text" name="firstName" placeholder="First Name" tabindex="5"/>
                <input type="text" name="middelName" placeholder="Middle Name" tabindex="6"/>
                <p class="gender"><input type="radio" name="gender" value="Male" checked="checked" tabindex="7"/> Male</p>
                <p class="gender"><input type="radio" name="gender" value="Female" tabindex="7"/> Female</p>
                
            	<input type="file" name="imgPath" id="imgPath"  placeholder="Enter Profile Picture" tabindex="8"/>
                <p></p>
                <p>Enter Profile Picture</p>
                <input type="text" value="" name="dateOfBirth" placeholder="Date of Birth"  id="datepicker" tabindex="9"/>
            </div>
            <div class="rightcol">
                <select name="countary" tabindex="10" >
                	<option selected="selected">Select Country</option>
                    <?php	$sql = "SELECT * FROM ems_countries";
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = $result->fetch_assoc())
								{ ?>
                                	<option><?php echo $row['countryName']; ?></option>
								<?php
								}
							} ?>
                </select>
                <select name="state" tabindex="10">
                	<option selected="selected">Select State</option>
                    <?php	$sql = "SELECT * FROM ems_states ORDER BY stateName ASC";
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = $result->fetch_assoc())
								{ ?>
                                	<option><?php echo $row['stateName'];
									$ci = $row['countryID'];?></option>
								<?php
								}
							} ?>
                </select>
                <select name="city" tabindex="11">
                	<option selected="selected">Select City</option>
                    <?php	$sql = "SELECT * FROM ems_cities ORDER BY cityName ASC";
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = $result->fetch_assoc())
								{ ?>
                                	<option><?php echo $row['cityName'];
									$ci = $row['countryID'];?></option>
								<?php
								}
							} ?>
                </select>
                <textarea name="address" placeholder="Present Address" tabindex="12"></textarea>
             </div>
		</fieldset>
        <fieldset>
            <h6>Contact Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
            	<input type="email" name="email" placeholder="E-Mail" maxlength="100" tabindex="13"/>
            </div>
            <div class="rightcol">
                <input type="text" name="phoneNumber" placeholder="Phone Number" onkeyup="number(this)" maxlength="10" tabindex="14"/>
            </div>
		</fieldset>
        <fieldset>
            <h6>Official Information</h6>
            <div class="clearfix"></div>
            <div class="leftcol">
            	<input type="text" name="startDate" value="" id="datepicker1" placeholder="Date of Joining" />
                <select name="role">
                	<option>Select Student</option>
                    <option value="2">Regular</option>
                    <option value="2">D2D</option>
                </select>
            </div>
            <div class="rightcol">
            	<input type="text" name="pfNumber" placeholder="Branch" maxlength="16" />
                <input type="text" name="panNumber" placeholder="UID" maxlength="16" />
                <input type="text" name="adharNumber" placeholder="Branch ID" onkeyup="number(this)" maxlength="12"/>
            </div>
		</fieldset>
        <input type="submit" value="Save" id="txtConfirmPassword" />
	</form>
</section>
<?php include "includes/footer.php"; ?>

</body>
</html>
<?php 
}
else {
	header('location: ../index.php');
} ?>