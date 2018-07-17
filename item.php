<?php 
$id = $_GET['id'];
//echo "$id";//check if id has been passed
 ?>
 <?php session_start();

if(!isset($_SESSION["cart"])){
    // create session variable for cart
    $_SESSION['cart'] = array();
}

if(!isset($_SESSION["item_count"])){
    // create session variable for item counter
    $_SESSION['item_count'] = 0;
}

?>

<?php include "includes/top.php"; ?>
<?php include "includes/nav.php"; ?>

<?php 
include "includes/db_config.php";

$sql = "SELECT * FROM items WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$product_name = $row["product_name"];
		$price = $row["price"];
		$image = $row["image"];
		$product_desc = $row["product_desc"];
	}
}

 ?>

 	<div class="row">
		<div class="col-lg-4">
			<div class="thumbnail">
				<img style="object-fit:contain" src="<?php echo $image; ?>">
			</div>
		</div>
		<div class="col-lg-8">
			<h3><?php echo $product_name; ?></h3><hr>
			<p><?php echo $product_desc; ?></p>
			<p><p>&#8369 <?php echo $price; ?></p>
			<input type='number' min='1' placeholder='0' class='form-inline' id='quantity<?php echo $id; ?>'>
			<button class="btn btn-primary"  onclick='addToCart(<?php echo $id; ?>)'>Add to Cart</button>
		</div>
	</div>
</div>

<!-- end  --> 
<?php include "includes/bottom.php"; ?>