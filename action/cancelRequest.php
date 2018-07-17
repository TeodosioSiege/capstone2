<?php 
$Order_Number = $_GET['Order_Number'];
$Item = $_GET['item'];
$name = $_GET['name'];
include "../includes/db_config.php";
$sql = "UPDATE order_items SET Status = 'Cancellation Requested' WHERE Order_Number = '$Order_Number' AND Item = $Item";
$result = mysqli_query($conn,$sql);
if ($result) {
 	header("location: ../orderItem.php?id=$Order_Number&name=$name&cancel=1");
 } 
 ?>