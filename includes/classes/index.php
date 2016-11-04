<?php
	include "../../config/config.php";
	include "ObjectCollection.php";
	include "LineItem.php";
	include "Item.php";
	session_start();
	
	$result = "";
	$mysqli_conn = new mysqli($db['hostname'],$db['username'],
					$db['password'],$db['database']);
	$result = $mysqli_conn->query("SELECT * FROM item");
	if ($mysqli_conn -> connect_errno) {//check the connection
			print "Failed to connect to MySQL: (" . 
					$mysqli_conn -> connect_errno . ") " . 
					$mysqli_conn -> connect_error;
	}
	
?>
<html>
<header><style>
.error {color: #FF0000;} 
</style></header>
<body>
<h2>Object Collection Example</h2>
<table border=1>
<tr>
<td>Item</td>
<td>Price</td></tr>
<?php
	$counter=1;
	while($row = $result->fetch_assoc()) {
		print '<tr><td><a href="http://localhost/webapp/includes/classes/
		displayPage.php?id='.$row["id"].'">Item '.$counter.'</a></td>';
		print "<td>".$row["price"]."</td>";
		$counter++;
	}	
?>
</table>
<?php
	$ca = new ObjectCollection();
	$bb = new Item("12",12);
	$aa = new LineItem($bb,10);

	if(isset($_SESSION["ObjColl"]))
	{
		$ca = $_SESSION["ObjColl"];
		//$aa = $ca->getLineItem(0);
		echo "<br/>Products Ordered: <br/>";
		
		for($i=0;$i<$ca->getLineCount();$i++)
		{
			echo "<br/>Product Description: ".$ca->getLineItem($i)->getItem()->getDescription();
			echo "<br/>Product Price: ".$ca->getLineItem($i)->getItem()->getPrice();
			echo "<br/>Quantity Ordered: ".$ca->getLineItem($i)->getQuantity();
		}
	}
?>
</body>
</html>