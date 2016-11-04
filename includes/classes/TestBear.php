<?php 
require_once('Bear.php'); 

  //Instantiatefirst bear - oass name to constructor 

  $daddy = new Bear("Daddy Bear",80); 

  $daddy->setAge(9); 

  $daddy->setWeight(300); 


$baby = new Bear("Baby Bear",10); 


print "Bears Created <br />";

  print $daddy->getName();

  print ". Age = ".$daddy->getAge();

  print ". Weight = ".$daddy->getWeight();

  print "<br />";

  $daddy->run(); 

  $daddy->kill(); 

  $baby->eat(); 


//Exiting will invoke the destructors 

  exit(); 

  $daddy->destruct(); 

  $baby->destruct();

?>