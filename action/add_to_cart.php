<?php 
session_start();
$id = $_POST['item_id'];
$quantity = $_POST['item_quantity'];

$_SESSION["cart"][$id] = $quantity;
$_SESSION["item_count"] = array_sum($_SESSION["cart"]);
echo "<span class='glyphicon glyphicon-shopping-cart'></span> Shop <span class='badge'>$_SESSION[item_count]</span>";
 ?>

