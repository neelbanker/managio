<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - MANAGIO</title>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include "config/connectDB.php" ?>
<div class="tableRow">
	<div class="tableCell">
        <section id="header1">
            <div class="wrapper">
                <div class="logo">
                    <a><img src="img/logo.png" /></a>
                </div>
            </div>
        </section>
        <section id="content1">
            <div class="wrapper">
                <div id="form">
                    <h1>Login</h1>
                    <form action="includes/login-user.php" method="post">
                        <div class="field">
                            <input type="email" name="email" placeholder="Enter E-Mail" required="required" autofocus />
                        </div>
                        <div class="field">
                            <input type="password" name="uPassword" placeholder="Enter Password" required="required" />
                        </div>
                        <div class="field">
                            <input class="button" type="submit" id="button" value="Login" placeholder="Login" />
                           <!-- <center><a href="admin/create-student.php">New Students Click Here </a></center>-->
                        </div>
                    </form>
                </div>
            </div>
		</section>
	</div>
</div>
</body>
</html>