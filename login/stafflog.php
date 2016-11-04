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
<?php
session_start();
include_once '../config/dbconnect.php';

if(!isset($_SESSION['username']))
					{
}
					?>
<h1><u><center>STAFF Login Here!</center></u></h1>
<center>
<div id="login-form">
						<center><form action="stafflogin.php" method= "post">
                    
<table align="center" width="30%" border="1" cellpadding="10" bordercolor="#000000" cellspacing="3">
<tr>
                                <td><input name="username" type="text" required="required" placeholder="Username *"></td>
</tr>
<tr>
                     <td><input name="password" type="password" required="required" id="password" placeholder="Password *"></td>
</tr>
<tr>
                               
                    <td><input type="submit" value="Log In" ></td>
              </tr>
</table>      
                   		 </form></center>
</div>
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</body>
</html>