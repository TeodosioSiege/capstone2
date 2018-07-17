<?php 
include '../includes/db_config.php';

$categoryId = $_POST['categoryId'];


$sql = "SELECT * FROM items where category_id = '$categoryId'";

$result = mysqli_query($conn,$sql);
$data = "<div class='row'>";

if (mysqli_num_rows($result) > 0) {
	$counter = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		$counter = $counter+1;
		$id = $row["id"];
		$data .= "
<div class='col-sm-6 col-md-4'>
	<div class='thumbnail'>
		 <img src='$row[image]' alt=''>
		 <div class='caption'>
			<h3><a href='item.php?id=$row[id]'>$row[product_name]</a></h3>
			<p>&#8369; $row[price]</p>
			<div class='form-group'>
			<input class='form-control' id='quantity$id' type='number' min='0' value='0'></div>
			<div class='form-group'>
				<button class='btn btn-primary btn-block btn-lg' role='button' onclick='addToCart($id)'><span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart</button>
			</div>
		</div>
	</div>
</div>";
	}
}
echo $data;
 ?>
