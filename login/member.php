<!DOCTYPE html>
<html>

<head>
		<title>Music World
        </title>
        <link href="../assets/css/music.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../assets/css/music.css" rel="stylesheet" type="text/css" media="print">
</head>
<body>
<div id="outter">
	<div id="container">
<div id="apDiv1"><img src="../assets/images/music4.jpg" width="900" height="150" alt="music Logo" /></div>

 
<h1>WELCOME TO "MUSIC WORLD"........</h1>
 <div class="header">
  <div id="h-navbar"><?php include "../header3.php"; ?></div>
</div>
  <div id="apDiv1"><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
<?php
//connection to database
	include('../config/connection.php');

	//start a session
	session_start();
	?>

<?php
					$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['username']);
					$userRow=mysql_fetch_array($res);					
					echo $userRow['username']; ?>
&nbsp;<a href="logout.php?logout">Sign Out</a>
<hr>
<h1>Hello User, u can edit your details <a href="amendprofile.php">here</a> </h1>

<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</body>
</html>