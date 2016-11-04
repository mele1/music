<?php
	include "../../config/config.php";
	require_once("LineItem.php");
	require_once("Item.php");
	require_once("ObjectCollection.php");
	session_start();
	
	$result = "";
	$mysqli_conn = new mysqli($db['hostname'],$db['username'],
					$db['password'],$db['database']);
	if ($mysqli_conn -> connect_errno) {//check the connection
			print "Failed to connect to MySQL: (" . 
					$mysqli_conn -> connect_errno . ") " . 
					$mysqli_conn -> connect_error;
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$id = $_POST["txtId"];
		$quantity = $_POST["txtQuantity"];
		$result = $mysqli_conn->query("SELECT * FROM item
				WHERE id = '".$id."'");
				
		//retrieve value from database and assign it to item object	
		$item = new Item("",0.00);
		
		if($row = $result->fetch_assoc())
		{
			$item->setId($row["id"]);
			$item->setPrice($row["price"]);
			$item->setDescription($row["description"]);
			$item->setImage($row["image"]);
		}
		
		$lineItem = new LineItem($item,$quantity);
		
		if(!isset($_SESSION["ObjColl"])) {
			$_SESSION["ObjColl"] = new ObjectCollection();
			$_SESSION["ObjColl"] ->addLineItem($lineItem);
		}
		else
		{
			$_SESSION["ObjColl"] ->addLineItem($lineItem);
		}
		
		header("Location: index.php");
	}

?>