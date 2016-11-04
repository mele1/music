
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

		//connection to database
		include 'config/connection.php';
		//Display heading
		echo '<h2><u>Admin Manage Products</u></h2>';
		//run query to select all records from customer table
		//store the result of the query in a variable
		$query="SELECT * FROM products";
		if (isset($_GET['sort'])){
			$query=$query." ORDER BY ".$_GET['sort'];
			//echo $query;
		}
		//displaying the data stored in the product table.
		$result = mysqli_query($connection, $query) or die(mysqli_error());
		echo '<table border="2"><tr><th><a href="admin.php?sort=product_id">Product ID</a></th><th><a href="admin.php?sort=product_name">Product Name</a></th><th><a href="admin.php?sort=productPrice">Price</a></th><th><a href="admin.php?sort=quantity">Product Quantity</a></th><th><a href="admin.php?sort=quantity">Product Image</a></th><th>Edit</th><th>Delete</th></tr>';
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row['product_id'] . '</td>';
			echo '<td>' . $row['product_name'] . '</td>';
			echo '<td>' . $row['price'] . '</td>';
			echo '<td>' . $row['quantity'] . '</td>';
			echo '<td><img src="assets/images/'.$row['image_name'].'" /></td>';
			echo '<td><a href="amendproduct.php?id=' . $row['product_id'] . '">Edit</a></td>';
			echo '<td><a href="deleteproducts.php?id=' . $row['product_id'] . '">Delete</a></td>';
			echo '</tr>';
		}
		echo '</table>';
		?>
		<p>
	
			<form method="post" action="WriteProduct.php">
				<fieldset class="fieldset-width1">
				
					<legend>
						Enter New Product Details
					</legend>
				
					<label class="align" for="txtproduct_id">Product ID: </label>
					<input type="text" name="txtproduct_id"  />
					<br />
					<br />
					<label class="align" for="txtproduct_name">Product Name: </label>
					<input type="text" name="txtproduct_name"  />
					<br />
					<br />
					<label class="align" for="txtprice">Price:</label>
					<input type="text" name="txtprice"  />
					<br />
					<br />
					<label class="align" for="txtimage_name">Image Filename: </label>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<br />
					<br />
					<label class="align" for="txtquantity">Product Quantity: </label>
					<input type="text" name="txtquantity"  />
					<br />
					<br />
				

					<input type="submit" value="Submit" name='submit' />
					<input type="reset" value="Clear" />
				</fieldset 	
			</form>
			
			<br />
			<br />
			<?php
						if (isset($_SESSION['errors'])){
					}
					else
					{
						echo '<a href="index.php">logout</a>';
					}
					?>
		</p>
    <div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</div>
</div>
</body>
</html>
