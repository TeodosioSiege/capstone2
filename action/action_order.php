<?php 
session_start();
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$fullAdd = $address." ".$city." ".$zip;
$range = 10000000000;
$log = ceil(log($range, 2));
 $bytes = (int) ($log / 8) + 1;
$ref = bin2hex(openssl_random_pseudo_bytes($bytes));

//echo "$fullAdd";

include "../includes/db_config.php";

$sql = "INSERT INTO orders (Customer_Name,Address,Ref_Number) VALUES ('$name','$fullAdd','$ref')";


$result = mysqli_query($conn,$sql);

if ($result) {
	$sql2 = "SELECT Order_Number From orders WHERE Customer_Name = '$name' ORDER BY Order_Number DESC LIMIT 1";
	$result2 = mysqli_query($conn,$sql2);
	if (mysqli_num_rows($result2) > 0) {
		while ($row = mysqli_fetch_assoc($result2)) {
			foreach($_SESSION['cart'] as $product_id => $quantity) {
				//echo "$product_id<br>$quantity<br>";
				//echo "$row[Order_Number]<br>";
				$sql3 = "insert into Order_Items (Order_Number, Item, Quantity, Status) values ($row[Order_Number], $product_id, $quantity, 'In Progress')";
				$result3 = mysqli_query($conn,$sql3);
			} //end foreach
		}//end while
	} //end if result2
	$_SESSION['item_count'] = 0;
	$_SESSION['cart'] = array();
	header("location: ../order.php"	);	
}//end result

 ?>