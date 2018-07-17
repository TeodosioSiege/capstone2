<?php session_start();

if(!isset($_SESSION["cart"])){
    // create session variable for cart
    $_SESSION['cart'] = array();
}

if(!isset($_SESSION["item_count"])){
    // create session variable for item counter
    $_SESSION['item_count'] = 0;
}
if(!isset($_SESSION["role"])){
    // create session variable for item counter
    $_SESSION['role'] = 'none';
}

?>

<?php include "includes/top.php"; ?>
<?php include "includes/nav.php"; ?>
<?php 
if (isset($_GET["pswX"])) {
	echo "<div class='alert alert-danger'>
		<strong>Passwords don't match!</strong>
	</div>";
} ?>
<?php 
if (isset($_GET["reg"])) {
	echo "<div class='alert alert-success'>
		<strong>Registration Successful!</strong>
	</div>";
} ?>
<?php 
if (isset($_GET["logOut"])) {
	echo "<div class='alert alert-info'>
		<strong>You have been Log Out</strong>
	</div>";
} ?>

<?php 
if (isset($_GET["regX"])) {
	echo "<div class='alert alert-danger'>
		<strong>Email already in use!</strong>
	</div>";
} ?>

<?php 
if (isset($_GET["logX"])) {
	echo "<div class='alert alert-danger'>
		<strong>Login Failed!</strong>
	</div>";
} ?>



<div class="container-fluid">
<h1 class=text-primary>Catalogue</h1>
<div class="row">
	<div class="col-md-2">
<?php 
include "includes/db_config.php";
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn,$sql);
$data = "";
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$description = $row['description'];
		$data .= "<a href='#' onclick='showCategories($id)' class='list-group-item'>$description</a>";
	}
}
echo "$data";
 ?>
	</div><!-- end col-md-2 --> 
	<div class="col-md-10" id="products">

<?php 
include "includes/db_config.php";
$sql = "SELECT * FROM items";
$result = mysqli_query($conn,$sql);
echo "<div class='row'>";
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//echo $row["product_name"]."<br>";//test if fetch successful
		echo "
<div class='col-md-4'>
<div class='thumbnail'>
<img src='".$row['image']."'>
<div class='caption'>
<h3><a href='item.php?id=".$row['id']."' target='_blank'>".$row['product_name']."</a></h3>
<p>&#8369; ".$row['price']."</p>
<input type='number' min='1' placeholder='0' class='form-control' id=quantity".$row['id']."><br>
<button class='btn btn-primary btn-block' onclick='addToCart(".$row['id'].")'>Add to cart</button>
</div>
</div>
</div>
		";
	}
}
 echo "</div>"; //end row

 ?>
</div><!-- end col-md-10 --> 
</div><!-- end row --> 
</div><!-- end container -->
<!-- end  --> 
<?php include "includes/bottom.php"; ?>

