<?php
	include "ObjectCollection.php";
	require_once("LineItem.php");
	require_once("Item.php");
	
	$item = new Item("123","Adidas");
	
	$item->setPrice(123.30);
	$item->setImage("BBB.jpg");
	
	$lineItem = new LineItem($item,10);
	
	$lineItem->changeQuantity(10);
	
	$oo = new ObjectCollection();
	
	$oo->addLineItem($lineItem);
	
	$lineItem2 = new LineItem("Nike",20);
	
	$lineItem2->changeQuantity(10);
	
	$oo->addLineItem($lineItem2);
	
	$oo->delLineItem($lineItem2);
	
	echo "<br/>AA: ".$oo->getLineCount();
	
	echo "<br/>BB: ".$oo->getLineItem(0);
	
	$oo->amendLineItemQuantity(0,32);
	echo "<br/>After call amendLineIemQuantity function";
	
	echo "<br/>CC: ".$oo->getLineItem(0);
	
?>