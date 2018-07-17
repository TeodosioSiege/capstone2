<?php 
$OrdItemId = $_GET['OrdItemId'];

//echo "$OrdItemId";
include "../includes/db_config.php";
$sql = "UPDATE order_items SET Status = 'In Transit' WHERE ordItemId = '$OrdItemId'";

$result = mysqli_query($conn,$sql);
if ($result) {
 	header("location: ../mngOrder.php");
 } 

 ?>