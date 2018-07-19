<?php session_start(); ?>

<?php include "includes/top.php"; ?>




<?php  
$id = $_GET['id'];	
$name = $_GET['name'];
if (isset($_GET["cancel"])) {
	echo "<div class='alert alert-success'>
		<strong>Cancellation Request Submitted!</strong>
	</div>";
}
echo "<h2>$name</h2>";
echo "<div class='container'><table class='table table-striped table-responsive'>
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";

include "includes/db_config.php";

$sql = "SELECT * FROM order_items LEFT JOIN items ON (order_items.Item = items.id) WHERE order_items.Order_Number = $id ";

$result =  mysqli_query($conn,$sql);

			$grand_total = 0;
if (mysqli_num_rows($result) > 0) {
  
	while ($row = mysqli_fetch_assoc($result)) {
		//echo "$row[product_name]<br>";
			$subTotal = $row['Quantity'] * $row['price'];
			$grand_total += $subTotal;
			$id = $_GET['id'];	
			echo "<tr><td>$row[product_name]</td><td>$row[price] </td><td id=quantity$row[id]>$row[Quantity]</td><td>$subTotal</td><td>$row[Status]</td><td><a href='#'class='btn btn-info'  onclick=\"quantity($row[id],$row[Quantity],$id,'$name')\"><i class='glyphicon glyphicon-edit'></i></a><a  href='action/cancelRequest.php?Order_Number=$id&item=$row[id]&name=$name' class='btn btn-danger'>Cancel Order</a></td></tr>";
	}
}

echo "</tbody></table>	
              <hr>
              <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span></div>	
              <hr>";	
?>


<?php include "includes/bottom.php"; ?>