<?php
	include "../config/connectDB.php";
	$x = $_SESSION['userName'];
	$sql = "SELECT imgPath,ID From ems_employee where userName = '$x' ";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
		{
			while($row = $result->fetch_assoc())
			{
?>
<section id="header">
    <p></p>
    <p></p>
	<a href="dashboard.php"><font face="Cyborg45" size="+2" color="white">&nbsp;&nbsp;&nbsp;
    MANAGIO</font><font size="-1" color="white"></font></a>
    <div class="icon3">
        <a href="logout.php">
            <p><i class="fa fa-power-off"></i></p>
        </a>
    </div>
    <div class="icon2">
        <a href="notification.php">
            <p><i class="fa fa-bell"></i></p>
        </a>
    </div>
	<div class="icon">
        <a href="profile.php?ID=<?php echo $row['ID']; ?>">
        	<img src="ems/<?php echo $row['imgPath']; ?>" align="absmiddle" />
        </a>
    </div>
</section>
		<?php }
		}
	?>