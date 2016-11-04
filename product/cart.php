<?php
session_start();

$page = 'buyproduct.php';

$connection=mysqli_connect('localhost', 'root', '', 'music') 
or die('Failed to connect');


if (isset($_GET['add'])) 
    {
	
$quantity = mysqli_query($connection, 'SELECT product_id, quantity FROM products WHERE product_id=' . 
mysql_real_escape_string((int)$_GET['add']));
	while ($quantity_row = mysqli_fetch_assoc($quantity)) 
   {
		
if ($quantity_row['quantity'] != $_SESSION['cart_' . (int)$_GET['add']]) 
  {
			
$_SESSION['cart_' . (int)$_GET['add']] += 1;

		
  }

	
  }
	
header('Location:' . $page);
}

if (isset($_GET['remove'])) 
  {
	
$_SESSION['cart_' . (int)$_GET['remove']]--;
	header('Location:' . $page);
}

if (isset($_GET['delete'])) 
{
	
$_SESSION['cart_' . (int)$_GET['delete']] = '0';
	header('Location:' . $page);
}

function products() 
{
	
$get = mysqli_query($GLOBALS['connection'], 'SELECT product_id, product_name, price, quantity FROM products WHERE quantity >0 ORDER BY product_id DESC');
	if (mysqli_num_rows($get) == 0) 
{
		
echo 'Your cart is empty';
	
} else {
		
while ($get_row = mysqli_fetch_assoc($get)) 
{
echo '<img src="../assets/images/'. $get_row['product_name'].'">';
			//echo '<a href="cart.php?add=' . $get_row['product_id'] . '" title="'. $get_row['product_name'] . ' = RM '. $get_row['price'] .'">';
			//echo '<img src="../assets/images/add.jpg"></a>';
	 //echo '<a href="cart.php?add=' . $get_row['product_id'] . '">add</a>';
	 echo '<a href="cart.php?add=' . $get_row['product_id'] . '" title="'. $get_row['product_name'] . ' = RM '. $get_row['price'] .'">';
			echo '<img src="../assets/images/add.jpg"></a>';
	 

	 
	 
	        

	 
     
}

	
}


}


function paypal_items()
{
	
$num='0';
	foreach ($_SESSION as $name=> $value) 
{
		
if ($value > 0) 
{
			
if (substr($name, 0, 5) == 'cart_') 
{
				
$id = substr($name, 5, (strlen($name) - 5));
				
$get = mysqli_query($GLOBALS['connection'], 'SELECT product_id, product_name, price,quantity FROM products WHERE product_id=' . 
mysql_real_escape_string((int)$id));
 while ($get_row = mysqli_fetch_assoc($get)) 
{
					
$num++;
echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
				    
echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['product_name'].'">';
					
echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['price'].'">';
					
echo '<input type="hidden" name="shipping_'.$num.'" value="'.$get_row['quantity'].'">';
			
					
echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
		
}
			
}

		
}

	
}
	
	

}


function cart() 
{
	
foreach ($_SESSION as $name => $value) 
{
		
if ($value > 0) 
{
			
if (substr($name, 0, 5) == 'cart_') 
{
				
$id = substr($name, 5, (strlen($name) - 5));
				
$get = mysqli_query($GLOBALS['connection'], 'SELECT product_id, product_name, price, quantity FROM products WHERE product_id=' . 
mysql_real_escape_string((int)$id));
				
while ($get_row = mysqli_fetch_assoc($get)) 
{
					
   $sub = $get_row['price'] * $value;
   echo '<p>';
					
echo $get_row['product_name'] . ' x ' . $value . ' @ &pound;' . number_format($get_row['price'], 2) . ' = &pound;' . number_format($sub, 2) . '<a href="cart.php?remove=' . $id . '">[-]</a><a href="cart.php?add=' . $id . '">[+]</a><a href="cart.php?delete=' . $id . '">[Delete]</a><br />';
echo '<p>';
				
}
		
}
			
       $total = @$total +  @$sub;


}

 
}
 
if (!isset($total)) 
{
		
echo '<p>Your cart is empty!</p>';
	
} 
else 
{
		
echo '<p>The total is &pound;' . number_format($total, 2).'</p>';

?>
<p>
	
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		
<input type="hidden" name="cmd" value="_cart">
		
<input type="hidden" name="upload" value="1">
		
<input type="hidden" name="business" value="Melenyirenda@yahoo.com">
		
<?php paypal_items(); ?>
		
<input type="hidden" name="currency_code" value="USD">
		
<input type="hidden" name="amount" value="<?php echo $value; ?>">
	
<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" 
name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	
</form>
</p>
<?php
}
}
?>