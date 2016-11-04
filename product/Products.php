<?php 
// class definition 
include '../config/connection.php';

  class Products { 

  // define properties /attributes 

	private $product_id; 
	private $product_name; 
	private $price; 
	private $image_name;
	private $quantity;

  //Constructor called when instantiating bear. This demonstrates a default weight parameter
  public function __construct(){ 

  } 

  //Destructor called when object leaves scope or script terminates 
  public function __destruct(){ 

  } 

  //Setters 
  public function setproduct_id($product_id) {
	$this->product_id = $product_id;
  }
  
  public function setproduct_name($product_name) {
	$this->product_name = $product_name;
  }
  
  public function setprice($price) {
	$this->price = $price;
  }
  
  public function setimage_name($image_name) {
	$this->image_name = $image_name;
  }
  
  public function setquantity($quantity) {
	$this->quantity = $quantity;
  }
  
  //Getters
  public function getproduct_id() {
	return $this->product_id;
  }
  
  public function getproduct_name() {
	return $this->product_name;
  }
  
  public function getprice() {
	return $this->price;
  }
  
  public function getimage_name() {
	return $this->image_name;
  }
  
  public function getquantity() {
	return $this->quantity;
  }
  
  public function getSpecificProduct($id) {
		$query="SELECT * FROM products WHERE product_id = ".$id;
		// Check connection
		
		$conn = Connection::getConnection();
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
			
		$result = mysqli_query(Connection::getConnection(), $query) or die(mysqli_error());
		
		if($row = mysqli_fetch_assoc($result)) {
			$this->product_id = $row["product_id"];
			$this->product_name = $row["product_name"];
			$this->quantity = $row["quantity"];
			$this->price = $row["price"];
			$this->image_name = $row["image_name"];
		}
  }
  
  public function deleteProduct() {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
			$stmt->bind_param("i", $this->product_id);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: admin.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo $error;
			}

			$stmt->close();
			$conn->close();
  }
  
   public function saveImage($imageDetails, $target) {
	if (move_uploaded_file($imageDetails, $target)) {
		return true;
	}
	else {
		return false;
	}
  }
  
  public function updateProducts($temp,$target) {
  
		$bool = $this->saveImage($temp,$target);
		
		if($bool == true) {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("UPDATE products SET product_name = ?, quantity = ?, image_name = ?, price = ? WHERE product_id = ?");
			$stmt->bind_param("sisdi", $this->product_name, $this->quantity, $this->image_name,$this->price,$this->product_id);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: admin.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo "Error updating";
			}

			$stmt->close();
			$conn->close();
		}
		else {
			echo "Error uploading image";
		}
  }
  
  public function addNewProducts($temp,$target) {
  
		$bool = $this->saveImage($temp,$target);
		
		if($bool == true) {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO products (name, price, imageName, quantity) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("sdsi", $this->name, $this->price, $this->imageName,$this->quantity);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: addNewProduct.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo "Error adding";
			}

			$stmt->close();
			$conn->close();
		}
		else {
			echo "Error uploading image";
		}
  }
  
 
  
  public function getProductList() {
		$query="SELECT * FROM products";
		if (isset($_GET['sort'])){
			$query=$query." ORDER BY ".$_GET['sort'];
			//echo $query;
		}
		$result = mysqli_query(Connection::getConnection(), $query) or die(mysqli_error());
		
		return $result;
  }
}
?>