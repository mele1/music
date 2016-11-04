<?php
	require_once("LineItem.php");
	require_once("Item.php");

	$item = new Item("123","dadas");
	
	$item->setPrice(123.30);
	$item->setImage("BBB.jpg");
	
	$lineItem = new LineItem($item,10);
	
	$lineItem->changeQuantity(10);
	
	$item2 = $lineItem->getItem();
	echo $item2." AAA ".$lineItem->getQuantity();
?>