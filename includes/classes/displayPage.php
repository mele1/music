<html>
<head></head>
<body>
<?php

include "../../config/config.php";
	
$result = "";
$mysqli_conn = new mysqli($db['hostname'],$db['username'],
				$db['password'],$db['database']);
					
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$id = $_GET["id"];
	
	$result = $mysqli_conn->query("SELECT * FROM item
				WHERE id = '".$id."'");
	
	$counter=1;
	
	if($row = $result->fetch_assoc()) {
		echo '<table border="1">';
		print '<tr><td>'.$row["id"].'</td>';
		print '<td>'.$row["description"].'</td>';
		print '<td>'.$row["image"].'</td>';
		print '<td>'.$row["price"].'</td></tr></table>';
	}	
	$product->setID($row["id"]);
	$product->setPrice($row["price"]);
}
?>
<form id="myForm" method="post" action="addToCollection.php"> 
  <br/>Quantity: 
   <input type="text" name="txtQuantity" required>
   <input type="submit" name="submit" value="Add to Collection"> 
   <input type="hidden" name="txtId" value="<?=$_GET["id"]; ?>">
   </form>
</body></html>