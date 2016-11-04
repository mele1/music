<?php 
require_once('Products.php'); 

  //Instantiatefirst product - oass name to constructor 

  $product = new Products(); 
  $product->setproduct_id(1); 
  $product->setproduct_name("Taylor Swift");
  $product->setprice(10);
  $product->setimage_name("taylor.jpg");
  $product->setquantity(2);
  
	print "These are the created Products <br/><br/>";

  print "Product ID = ".$product->getproduct_id();
  print "<br/>Name = ".$product->getproduct_name();
  print "<br/>Price = RM ".$product->getprice();
  print "<br/>Image Name = ".$product->getimage_name();
  print "<br/>Quantity = ".$product->getquantity();


//Exiting will invoke the destructors 
  $product->__destruct(); 
?>