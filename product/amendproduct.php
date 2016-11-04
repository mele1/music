<?php

//Make connection to database
include 'connection.php';
$product_id = $_GET['id'];
$query = "SELECT * FROM products WHERE product_id='$product_id' ";
//echo $query . '<br />';

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
If (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
} else {
	$row = NULL;
}
?>
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
  <div id="h-navbar"><?php include "header.php"; ?></div>
</div>
 <div id="apDiv1"><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
		<form method="post" action="updateproducts.php">

			<fieldset class="fieldset-width">
				<legend>
					Product Details
				</legend>
				<input type="hidden" name="hideproduct_id" value="<?php echo $product_id; ?>" />
				<label for="txtproduct_name">Product Name: </label>
				<input type="text" name="txtproduct_name"  value="<?php echo $row['product_name']; ?>"/>
				<br />
				<br />
				<label for="txtprice">Product Price: </label>
				<input type="text" name="txtprice" value="<?php echo $row['price']; ?>" />
				<br />
				<br />
				<label for="txtimage_name">Image Name: </label>
				<input type="text" name="txtimage_name"  value="<?php echo $row['image_name']; ?>"/>
				<br />
				<br />
				<label for="txtquantity">Quantity: </label>
				<input type="text" name="txtquantity"  value="<?php echo $row['quantity']; ?>"/>

			</fieldset>

			<input type="submit" value="Update" name='submit' />
			<input type="reset" value="Clear" />
		</form>
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div
	</body>
</html>