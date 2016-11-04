<?php
	require_once("Item.php");
	
	$item = new Item("123",123.30);
	
	$item->setDescription("Adidas");
	$item->setImage("ABC.jpg");
	
	echo $item;
	
	echo "<br/>Product ID: ".$item->getId();
	echo "<br/>Product Description: ".$item->getDescription();
	echo "<br/>Product Price: ".$item->getPrice();
?>