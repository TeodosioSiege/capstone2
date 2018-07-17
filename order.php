<?php 
session_start();
if (!isset($_SESSION["id"])) {
	header("location:index.php");
}
 ?>

 <?php include "includes/top.php"; ?>
<?php include "includes/nav.php"; ?>

<?php 
if (isset($_GET["del"])) {
	echo "<div class='alert alert-danger'>
		<strong>Record Deleted</strong>
	</div>";
}

if (isset($_GET["update"])) {
	echo "<div class='alert alert-info'>
		<strong>Record Updated</strong>
	</div>";
} 
 ?>

<?php 
include "includes/db_config.php";

$sql = "SELECT * FROM orders WHERE Customer_Name = '$name'";
$result = mysqli_query($conn,$sql);
echo "<table class='table table-bordered'>
	<thead>
		<tr>
			<th>Order/Tracking Number</th>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>";
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "
<tr>
<td>$row[Ref_Number]</td>
<td>$row[Customer_Name]</td>
<td>$row[Address]</td>
<td>
<a href='#'class='btn btn-info' data-toggle='modal' data-target='#myModal_$row[Order_Number]'><i class='glyphicon glyphicon-edit'></i></a>
<a href='orderItem.php?id=$row[Order_Number]&name=$row[Customer_Name]' class='btn btn-success'><i class='glyphicon glyphicon-eye-open'> View Ordered Products</i></a></td>
</tr>
		
<!-- Modal -->
<div id='myModal_$row[Order_Number]' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Billing Address</h4>
      </div>
      <div class='modal-body'>
      <form action='action/updateOrder.php?id=$row[Order_Number]' method='POST'>
      		<input type='text' value= echo $name; name='name' hidden></input>
            <i class='fa fa-address-card-o'></i> Address
            <input type='text' id='adr_$row[Order_Number]' name='address' class='form-control'required><br>
        <div class='container-fluid' style='margin: auto;'>
            <i class='fa fa-institution'></i> City
            <input type='text' id='city_$row[Order_Number]' name='city' class='form-inline' required>
            Zip
            <input type='text' id='zip_$row[Order_Number]' name='zip' class='form-inline' required>
        </div>
      </div>
      <div class='modal-footer'>
        <button type='submit' class='btn btn-default'>Confirm</button>
      </div>
     </form>
    </div>

  </div>
</div> <!-- end Modal -->

		";
	}
} else {
	echo "No Records Found";
}
echo "<tbody></table>";
 ?>


<!-- end  --> 
<?php include "includes/bottom.php"; ?>