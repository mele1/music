<?php

//Make connection to database
include '../config/connection.php';
$user_id = $_GET['user_id'];



?>
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
  <div id="h-navbar"><?php include "../header2.php"; ?></div>
</div>
  <div id="apDiv1"><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
	<body>
<center>
      
          

<h3><u>

Edit your profile and save!</u>

</h3>
       

        
<?php
$query = "SELECT * FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
If (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);



} else {
	$row = NULL;
}
  ?>         
<form method="post" action="updateprofile.php">

			<fieldset class="fieldset-width">
				<legend>
					Your Details
				</legend>
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
				<label for="txtusername">User Name: </label>
				<input type="text" name="txtusername"  value="<?php echo $row['username']; ?>"/>
				<br />
				<br />
				<label for="txtemail">Email: </label>
				<input type="text" name="txtemail" value="<?php echo $row['email']; ?>" />
				<br />
				<br />
				<label for="txtpassword">Password: </label>
				<input type="text" name="txtpassword"  value="<?php echo $row['password']; ?>"/>
				<br />
		
<br>
<br>
				

			</fieldset>

			<input type="submit" value="Update" name='submit' />
			<input type="reset" value="Clear" />
		</form>
</center>
	</body>
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</html>