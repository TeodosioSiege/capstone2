<?php 
include '../includes/db_config.php';

$status = $_POST['Status'];

$sql = "SELECT * FROM Order_Items LEFT JOIN items ON (order_items.Item = items.id) LEFT JOIN orders ON (order_items.Order_Number = orders.Order_Number) where Status = '$status'";

$result = mysqli_query($conn,$sql);


$data = "<div class='container'><table class='table table-striped table-responsive'>
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

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$data .= "
<tr><td>$row[Ref_Number]</td><td>$row[product_name]</td><td>$row[Quantity]</td><td>$row[Status]</td>
		<td><a  href='action/cancelOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-danger' onclick='return confirm(\"Do you want to cancel this order?\");'>Cancel Order/Delete Record</a>
		<a  href='action/tranOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-info'>Set In Transit</a>
		<a  href='action/deliverOrder.php?OrdItemId=$row[ordItemId]' class='btn btn-success'>Set Delivered</a>
		</td></tr>
		";
	}
}

echo $data;
 ?>