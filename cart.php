<?php 
session_start();

if ($_SESSION['item_count'] == 0) {
  header('location: index.php');
}

// var_export($_SESSION['cart']);
// echo "<hr>";

// foreach ($_SESSION['cart'] as $product_id => $quantity) {
// 	echo "product id: $product_id<br>";
// 	echo "quantity: $quantity<br><br>";
// }

 ?>
<?php include "includes/top.php"; ?>


<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Billing Address</h4>
      </div>
      <div class="modal-body">
       <p><strong>Billing Method:</strong> CoD</p>
      <form action="action/action_order.php" method="POST">
      		<input type="text" value='<?php $completeName = $_SESSION['name'];
                    echo "$completeName";
                     ?>' name="name" hidden></input>
            <i class="fa fa-address-card-o"></i> Address
            <input type="text" id="adr" name="address" class="form-control" required><br>
        <div class="container-fluid" style="margin: auto;">
            <i class="fa fa-institution"></i> City
            <input type="text" id="city" name="city" class="form-inline" required>
            Zip
            <input type="text" id="zip" name="zip" class="form-inline" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
     </form>
    </div>

  </div>
</div>

 <div class="container" style="margin-top:60px">
 <h2>My Shopping Cart</h2><hr>

 <div id="loadCart"></div>


<script type="text/javascript">
// READ records using AJAX shorthand get request

$(document).ready(function () {
    // READ records on page load
    loadCart(); // calling function
});

</script>

<!-- end  --> 
<?php include "includes/bottom.php"; ?>

