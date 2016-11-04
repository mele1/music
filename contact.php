<!DOCTYPE html>
<html>

<head>
		<title>Music World
        </title>
<link href="assets/css/music.css" rel="stylesheet" type="text/css" media="screen">
        <link href="assets/css/music.css" rel="stylesheet" type="text/css" media="print">
</head>
<body>
<div id="outter">
	<div id="container">

<div id="apDiv1"><img src="assets/images/music4.jpg" width="900" height="150" alt="music Logo" /></div>

 
<h1>WELCOME TO "MUSIC WORLD"........</h1>
 <div class="header">
  <div id="h-navbar"><?php include "header.php"; ?></div>
</div>
 <div id="apDiv1"><img src="assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
<?php
include_once 'config/dbconnect.php';
$connection=mysqli_connect('localhost', 'root', '', 'music') 
or die('Failed to connect');

if(isset($_POST['btn-submit']))
{
	$txtusername = mysql_real_escape_string($_POST['username']);
	$txtemail = mysql_real_escape_string($_POST['email']);
	$txtmessage = mysql_real_escape_string($_POST['message']);


	if(mysql_query("INSERT INTO feedback (username,email,message) VALUES('$txtusername','$txtemail','$txtmessage')"))
	{
		?>
        <script>alert('Your message has been sent successfully');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while sending message');</script>
        <?php
	}
}
?>
<br>
<form id="form1" name="form1" method="post" action="contact.php">
	<fieldset class="fieldset-width1" width="300px">
	<legend>Please fill in the fields, and click on submit button"</legend>
      <table border="0" padding="5">
        <tr>
          <td width="152"><label for="username">Your name</label></td>
          <td width="442"><input name="username" type="text" id="username" size="60" required/></td>
        </tr>
		<tr>
          <td width="152"><label for="email">Your Email</label></td>
          <td width="442"><input name="email" type="text" id="email" size="60" required/></td>
        </tr>
        <tr>
          <td><label for="message">Message</label></td>
          <td><textarea rows="4" cols="52" name="message">
				</textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><button type="submit" name="btn-submit" id="submit">Submit</button></td>
        </tr>
      </table>
	</fieldset>
</form>
	
    
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</div>
</body>
</html>