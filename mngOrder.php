<?php session_start(); ?>

<?php if (!isset($_SESSION['name']))
  {header('location: index.php'); }
else if ($_SESSION['name'] !== 'Admin') {
 {header('location: index.php'); }
}

  ?>

<?php include "includes/top.php"; ?>
<?php include "includes/nav.php"; ?>
<?php if (isset($_GET["dltOrd"])) {
  echo "<div class='alert alert-success'>
    <strong>Order Record has been deleted!</strong>
  </div>";
} ?>
<?php 
include "includes/db_config.php";
echo "<div class='container-fluid'><div class='row'><div class='col-xs-12 col-md-2'>";

include "includes/db_config.php";
$sql = "SELECT DISTINCT Status FROM Order_Items";
$result = mysqli_query($conn,$sql);
$data = "";
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//$id = $row['id'];
		$status = $row['Status'];
		$data .= "<a href='#' onclick='showStatus(\"$status\")' class='list-group-item'>$status</a>";
	}
}
echo "$data";


echo "</div>";
echo "<div class='col-xs-12 col-md-10' id='status' style='margin-top: 10px'><div class='table-responsive '><table class='table  table-striped table-compact'>
    <thead>
      <tr>
        <th>Reference Number</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";

$sql = "SELECT * FROM order_items LEFT JOIN items ON (order_items.Item = items.id) LEFT JOIN orders ON (order_items.Order_Number = orders.Order_Number)";

$result =  mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>$row[Ref_Number]</td><td>$row[product_name]</td><td>$row[Quantity]</td><td>$row[Status]</td>
		<td><a  href='action/cancelOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-danger' onclick='return confirm(\"Do you want to cancel this order?\");'>Cancel Order/Delete Record</a>
		<a  href='action/tranOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-info'>Set In Transit</a>
		<a  href='action/deliverOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-success'>Set Delivered</a>
		</td></tr>";

	}
}

echo "</tbody></table></div></div></div></div>";

 ?>

<?php include "includes/bottom.php"; ?>