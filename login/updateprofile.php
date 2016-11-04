<?php
//Connection to the database
$connection = mysqli_connect('localhost', 'root', '', 'music') or die(mysqli_error());
?>
<?php
//colllecting submitted data and storing it in a variable 
$user_id=$_POST['hideuser_id'];

$username=$_POST['txtusername'] ;

$email= $_POST['txtemail'];
$password= $_POST['txtpassword'];
//INSERT the variables that collected the data submitted.
$query="UPDATE user SET username='$username',email='$email', password='$password'  WHERE user_id='$user_id'";
//run the $query 
mysqli_query( $connection,$query)or die (mysqli_error($connection));



//link to the page
header( 'Location: member.php' ) ;

?>