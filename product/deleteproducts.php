<?php
//Make connection to database
include 'connection.php';
// Store ID to be deleted
$id = $_GET['id'];
// create query and delete record
$query = "DELETE FROM products WHERE product_id = '$id' ";
mysqli_query($connection, $query) or exit("Error in query: $query. " . mysqli_error($connection));

// see if any rows were affected
if (mysqli_affected_rows($connection) > 0) {
	//If so , return to calling page(stored in the server variables as HTTP_REFERER
	header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
	// print error message
	echo "Error in query: $query. " . mysqli_error($connection);
	exit ;
}
?>
