<?php session_start(); ?>

<?php 

$id = $_GET['id'];

include "../includes/db_config.php";

$sql = "select * from items where id = $id";


$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$filepath = "../".$row['image'];
		echo "$filepath";
		if (unlink("$filepath")) {
			
 $sql="DELETE FROM items WHERE id='$id'";

$result = mysqli_query($conn,$sql);

if ($result) {
	header("location: ../updateProducts.php?del=1");
}else {
	echo "Delete Failed";
}
		}
	}
}
 


 ?>