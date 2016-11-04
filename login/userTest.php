<?php 
require_once('Users.php'); 

  //Instantiatefirst product - oass name to constructor 

  $user = new Users(); 
  $user->setuser_id("11"); 
  $user->setpassword("mele");
  $user->setemail("melenyirenda@yahoo.com");
  $user->setprotection("What is your mother name?");
  $user->setIsAdmin("Y");
  
	print "Users Created <br/><br/>";

  print "User ID = ".$user->getuser_id();
  print "<br/>Name = ".$user->getpassword();
  print "<br/>Email = ".$user->getemail();
  print "<br/>Security Question = ".$user->getprotection();
  print "<br/>User Type = ".$user->getIsAdmin();


//Exiting will invoke the destructors 

  $user->__destruct(); 
?>