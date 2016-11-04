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
	//calling the cart file
	require 'cart.php';
include('../config/connection.php');
if(!isset($_SESSION['user'])!="")
{
	header("Location: index.php");
}

	
	require 'displayproducts.php';

	//connection to database
	include('../config/connection.php');
	?>
<br>
<h1>My cart</h1>
	  <div><?php cart(); ?></div>
	  
	  <h1>Music World Songs on Offer</h1>

				<div><?php products(); ?></div>
                  
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</body>
</html>