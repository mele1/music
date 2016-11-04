<?php 
include '../config/connection.php';
// class definition 

  class Users { 

  // define properties /attributes 

  private $user_id; 
  private $password; 
  private $email; 
	private $protection;
	private $isAdmin;

  //Constructor called when instantiating bear. This demonstrates a default weight parameter

  public function __construct(){ 

  } 

  //Destructor called when object leaves scope or script terminates 

  public function __destruct(){ 

  } 

  //Setters 
  public function setuser_id($user_id) { 
	$this->user_id = $user_id;
  } 
  
  public function setpassword($password) {
	$this->password = $password;
  }
  
  public function setemail($email) {
	$this->email = $email;
  }
  
  public function setprotection($protection) {
	$this->protection = $protection;
  }
  
  public function setIsAdmin($isAdmin) {
	$this->isAdmin = $isAdmin;
  }
  
  //Getters
  public function getuser_id() { 
	return $this->user_id; 
  } 
  
  public function getpassword() {
	return $this->password;
  }
  
  public function getemail() {
	return $this->email;
  }
  
  public function getprotection() {
	return $this->protection;
  }
  
  public function getIsAdmin() {
	return $this->isAdmin;
  }
  
  public function addNewUser() {
		
		$conn = Connection::getConnection();

				// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// prepare and bind
		$stmt = $conn->prepare("INSERT INTO user (user_id, password, email, protection, isAdmin) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $this->user_id, $this->password, $this->email, $this->protection,$this->isAdmin);

		$stmt->execute();

		if (mysqli_affected_rows($conn) > 0) {

			//If so , return to calling page(stored in the server variables as HTTP_REFERER

			return "success";

		} else {
			// print error message
			$error = "Fail". mysqli_error($conn);
			return $error;
		}

		$stmt->close();
		$conn->close();
  }
  
  public function validateLogin() {
	$connection = Connection::getConnection();
    $result = "";
	$q = "SELECT * FROM user WHERE user_id = '" . $this->user_id . "'" . " AND password = '" . $this->password . "'";
	// Run query
	$r = mysqli_query($connection,$q) or die(mysqli_error());

	// check if any data was returned from the database
	if ($obj = mysqli_fetch_assoc($r)) {
		session_start();
		// echo "session started!";
		$isAdmin = $obj["isAdmin"]; 
		
		$_SESSION["valid_user"] = $this->user_id;
		$_SESSION["valid_time"] = time();
		$_SESSION["isAdmin"] = $isAdmin;
		
		if($isAdmin == "Y") {
			$result = "location:admin.php"; // comment/uncomment for error checking
		}
		else {
			$result = "location: ../product/member.php"; // comment/uncomment for error checking
		}
		
	} else {
		// Redirect to login fail page
		$result = "location: login_fail.php";   // comment/uncomment for error checking
	}
	
	$connection->close();
	
	return $result;
  }
}
?>