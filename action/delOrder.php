<?php 
$id = $_GET['id'];
//echo "$id";

include "../includes/db_config.php";

$sql = "DELETE FROM orders WHERE Order_Number='$id'";

$result = mysqli_query($conn,$sql);

if ($result) {
	header("location:../order.php?del=yes");
}else {
	echo "Delete Failed";
}


 ?>