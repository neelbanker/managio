<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QR-Managio</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
</head>
<body class="bgback">
<?php if($_SESSION['userName']) { ?>
<?php include "../config/connectDB.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/tab.php"; ?>
<?php	$xu = $_SESSION['userName'];
		$sql = "SELECT ID,firstName FROM ems_employee WHERE userName = '$xu'";
		$result = mysqli_query($conn, $sql);
		
		$row = $result->fetch_assoc();
		
		$xi = $row['ID'];
		$f = 1; 
		?>
<section id="content">


<?php 
// if(isset($_POST['generate_text']))

 include('phpqrcode/qrlib.php'); 
 $sub_name=$_REQUEST['sub'];
 $fac_name=$_REQUEST['fac'];
 $str=$sub_name.','.$fac_name;
 // $text='Attendance Success-Full of  '.$sub_name;
  $folder="img/";
  $file_name="qr";
 // $file_name=$folder.$file_name;
 // QRcode::png($text);
QRcode::png($str, $folder.''.$file_name.'.png','H',4,5);
echo "<br><h4>Scan QR Code</h4>";
 echo"<br><br><center><img src='img/qr.png' height='300' width='300'></center>";
 
 //To Display Code Without Storing
 // QRcode::png($text);

?>


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