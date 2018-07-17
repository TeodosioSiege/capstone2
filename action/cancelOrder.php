<?php 
$OrdItemId = $_GET['OrdItemId'];

//echo "$OrdItemId";
include "../includes/db_config.php";
$sql = "DELETE FROM  order_items WHERE ordItemId = '$OrdItemId'";
$result = mysqli_query($conn,$sql);
if ($result) {
 	header("location: ../mngOrder.php?dltOrd=1");
 } 

 ?>