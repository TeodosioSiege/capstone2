<?php 
	session_start();




include "../includes/db_config.php";

$data = "<table class='table table-striped table-responsive'>
    <thead>
      <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sub-Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";

$grand_total = 0;

foreach($_SESSION['cart'] as $product_id => $quantity) {
    $sql = "SELECT * FROM items where id = '$product_id' ";
              $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      $product_name = $row["product_name"];
                      $product_desc = $row["product_desc"];
                      $price = $row["price"];
                                
                        //For computing the sub total and grand total
                        $subTotal = $quantity * $price;
                        $grand_total += $subTotal;

                        $data .=
                          "<tr>
                              <td>$product_name</input></td>
                              <td id='price$product_id'> $price</td>
                              <td><input type='number' class ='form-control' value = '$quantity' id='quantity$product_id' onchange='changeNoItems($product_id)' min='1' size='5'></td>
                              <td id='subTotal$product_id'>$subTotal</td>
                              <td><button class='btn btn-danger' onclick='removeFromCart($product_id)'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Remove</button></td>
                          </tr>";
                    }
                }
}


if (!isset($_SESSION['id'])) {
  $onclick = "data-toggle='modal' data-target='#myModal' onclick=openForm(event,'Log-in')";
}elseif ($grand_total == 0) {
  $onclick = "onclick=\"alert('please choose an item first!');\" ";
}else{$onclick = "data-toggle='modal' data-target='#myModal2'";}

$data .="</tbody></table>
              <hr>
              <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><button class='btn btn-success btn-lg' ".$onclick."><span class='glyphicon glyphicon-ok-sign'></span> Check Out</button></h3>
              <hr>";

echo $data;
?>

