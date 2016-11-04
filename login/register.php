<?php
require('../config/dbconnect.php'); 



//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}
			
	}

	

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}
			
	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//send email
			$to = $_POST['email'];
			$subject = "Registration Confirmation";
			$body = "Thank you for registering at demo site.\n\n To activate your account, please click on this link:\n\n ".DIR."login/activate.php?x=$id&y=$activasion\n\n Regards Site Admin \n\n";
			$additionalheaders = "From: <".SITEEMAIL.">\r\n";
			$additionalheaders .= "Reply-To: ".SITEEMAIL."";
			mail($to, $subject, $body, $additionalheaders);

			//redirect to index page
			header('Location: ../index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Demo';

?>
<!DOCTYPE html>
<html>

<head>
		<title>Music World
        </title>
        <link href="../assets/css/music.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../assets/css/music.css" rel="stylesheet" type="text/css" media="print">
</head>
<body>
<div id="outter">
	<div id="container">
<div id="apDiv1"><img src="../assets/images/music4.jpg" width="900" height="150" alt="music Logo" /></div>

 
<h1>WELCOME TO "MUSIC WORLD"........</h1>
 <div class="header">
  <div id="h-navbar"><?php include "../header2.php"; ?></div>
</div>
 <div id="apDiv1"><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /><img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
 <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" /> <img src="../assets/images/butterfly-ovr.gif" width="170" height="150" alt="GreenStart Logo" />
</div>
<br>
<?php
include_once '../config/dbconnect.php';
if(isset($_POST['btn-signup']))

{
	$uname = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['password']));
	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}
	
	if(mysql_query("INSERT INTO user(username,email,password) VALUES('$uname','$email','$upass')"))
	
	{
		?>
        <script>alert('successfully registered ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
?>
<h1><u><center>Register Here!</center></u></h1>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="1" cellpadding="10" bordercolor="#000000" cellspacing="3">
<tr>
<td><input type="text" name="username" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="login.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
<div id="footer">
        
        	 <div ="footertext">
             <center>
            Copyright Musicworld.com 2016. All rights reserved.</center>
            </div>
</div>
</body>
</html>