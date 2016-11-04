<?php
//Connection to the database
include 'connection.php';
//colllecting submitted data and storing it in a variable 
$product_id=$_POST['txtproduct_id'];
$product_name=$_POST['txtproduct_name'];
$price= $_POST['txtprice'];
$image_name= $_POST['txtimage_name'];
$quantity= $_POST['txtquantity'];
//INSERT the variables that collected the data submitted.
$query = "INSERT INTO products (product_id, product_name, price, image_name, quantity)
		VALUES ('$product_id', '$product_name', '$price', '$image_name', '$quantity')";

//Temporarily echo $query for debugging purposes
//echo $query;

//run $query
mysqli_query($connection, $query) or die(mysqli_error());
if (mysqli_affected_rows($connection) > 0) {

	//If so , returning to the calling page( that stored in the server variables as HTTP_REFERER

	header("Location: {$_SERVER['HTTP_REFERER']}");

} else {

	// Displaying error message

	echo "Error in query: $query. " . mysqli_error($connection);

	exit ;

}
?>