<?php 
$orderNumber = $_POST['orderNumber'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
//echo "$orderNumber and  $item and $quantity - $name";

include '../includes/db_config.php';
$sql = "UPDATE order_items SET quantity = '$quantity' WHERE Order_Number = '$orderNumber' AND Item = '$item'";
$result = mysqli_query($conn,$sql);
	if ($result) {
		header("location:../orderItem.php?id=$orderNumber&name=$name");
	} else {
		echo "Update failed";
 	}
	
 ?>