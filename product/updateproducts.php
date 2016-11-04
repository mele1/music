<?php
//Connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'music') or die(mysqli_error());
//colllecting submitted data and storing it in a variable 
$product_id=$_POST['hideproduct_id'];
$product_name=$_POST['txtproduct_name'] ;
$price= $_POST['txtprice'];
$quantity= $_POST['txtquantity'];
$image_name=$_POST['txtimage_name'] ;

//INSERT the variables that collected the data submitted.
$query="UPDATE products SET product_name='$product_name', 
 price='$price', quantity='$quantity', image_name='$image_name' WHERE product_id='$product_id' ";

//run the $query 
mysqli_query($connection, $query)or die (mysqli_error());

//link to the page
header( 'Location: admin.php' ) ;
?>