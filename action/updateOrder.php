<?php 
session_start();
$id = $_GET['id'];

//echo "$id";

$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$fullAdd = $address." ".$city." ".$zip;

//echo "$fullAdd";

include "../includes/db_config.php";

$sql="UPDATE orders SET Address='$fullAdd' WHERE Order_Number=$id";

$result = mysqli_query($conn,$sql);

if ($result) {
	header("location: ../order.php?update=yes");
}else {
	echo "Delete Failed";
}

 ?>