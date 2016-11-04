<!DOCTYPE html>
<html>

<head>
		<title>Music World
        </title>
<link href="music.css" rel="stylesheet" type="text/css" media="screen">
        <link href="music.css" rel="stylesheet" type="text/css" media="print">
</head>
<body>
<div id="outter">
	<div id="container">

<div id="apDiv1"><img src="music4.jpg" width="900" height="150" alt="music Logo" /></div>

 
<h1>WELCOME TO "MUSIC WORLD"........</h1>
 <div class="header">
  <div id="h-navbar"><?php include "../header2.php"; ?></div>
</div>
 <div id="apDiv1"><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
	<?php
	//make connection to database
	include('../config/connection.php');
	//start a session
	session_start();
	
	$username=$_POST['username'] ;
	$password=$_POST['password'] ;
	
	$query="SELECT * FROM staff WHERE username = '$username' 
	AND password ='$password'";
	$result = mysqli_query($connection, $query) or 
	die(mysqli_error());
	
	if ($row = mysqli_fetch_assoc($result)) {

	$_SESSION['username']=$username;
	header ('location:../admin.php');
	
	}
	else
	{
	
	$_SESSION['errors']= '<P><font color="red">User not recognised</font></P>';
	header ('location:errorpage.php');
	
	}
	?>
</section>	

</body>

</html>



