<?php

$page = 'products.php';

$connection=mysqli_connect('localhost', 'root', '', 'music') or die('Failed to connect');


function buy() {
	$get = mysqli_query($GLOBALS['connection'], 'SELECT product_id, product_name, price, productShipping, image_name FROM products WHERE quantity >0 ORDER BY product_id DESC');
	if (mysqli_num_rows($get) == 0) {
		echo 'Your cart is empty';
	} else {
		while ($get_row = mysqli_fetch_assoc($get)) {
			
			echo '<img class="image-products" src="images/'. $get_row['image_name'].'">';
			echo '<a href="cart.php?add=' . $get_row['productID'] . '" title="'. $get_row['productDescription'] . ' = RM '. $get_row['price'] .'">';
			echo '<a href="login.php"><img src="add.gif"></a>';
	
		}
		
	}
	
}
?>