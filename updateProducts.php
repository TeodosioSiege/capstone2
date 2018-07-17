<?php session_start(); ?>

<?php if (!isset($_SESSION['name']))
  {header('location: index.php'); }
else if ($_SESSION['name'] !== 'Admin') {
 {header('location: index.php'); }
}

  ?>

<?php include "includes/top.php"; ?>
<?php include "includes/nav.php"; ?>
<?php 
if (isset($_GET["insert"])) {
	echo "<div class='alert alert-success'>
		<strong>Item Added</strong>
	</div>";
} ?>
<?php 
if (isset($_GET["update"])) {
	echo "<div class='alert alert-success'>
		<strong>Item Updated</strong>
	</div>";
} ?>
<?php 
if (isset($_GET["del"])) {
	echo "<div class='alert alert-success'>
		<strong>Item Deleted</strong>
	</div>";
} ?>
<div class="container">
<?php 
include "includes/db_config.php";
echo "
<hr>
 <div align='right'><button class='btn btn-success btn-lg text-right'  data-toggle='modal' data-target='#Modal'><span class='glyphicon glyphicon-plus'></span> Add Product</button></div>
<hr><div class='container'><table class='table table-striped table-responsive'>
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image Source</th>
        <th>Product Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>";

$sql = "SELECT * FROM items";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$category = array("Brass","Keyboard","Percussion","Strings(Bowed)","Strings(Plucked)","Woodwind");
		$cat = $row['category_id'] -1;
		echo "<tr><td>$row[id]</td><td>$row[product_name]</td><td>$row[price]</td><td>$category[$cat]</td><td>$row[image]</td><td>$row[product_desc]</td>
		<td><a onClick='return confirm(\"Do you want to delete this item?\");' href='action/delProduct.php?id=$row[id]' class='btn btn-danger' ><i class='glyphicon glyphicon-trash'></i></a>
		<a href='#'class='btn btn-info' data-toggle='modal' data-target='#Modal_$row[id]'><i class='glyphicon glyphicon-edit'></i></a></td>
		</tr>

<!-- Modal -->
<div id='Modal_$row[id]' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Product Info</h4>
      </div>
      <div class='modal-body'>
      <form action='action/modifyProduct.php?id=$row[id]' method='POST' enctype='multipart/form-data'>
						Product Name:<br><input type='text' class='form-control' name='product' id='product_$row[id]' value='$row[product_name]'><br>
						Price:<br> <input type='number' class='form-control' name='price' id='price_$row[id]' value='$row[price]'><br>
						Category Id: <br>
						<div class='form-group'>
							<select class='form-control' id='category_$row[id]' name='category'>
								<option value='1'".(($row['category_id']==1)?' selected':"")." >Brass</option>
								<option value='2'".(($row['category_id']==2)?' selected':"")." >Keyboard</option>
								<option value='3'".(($row['category_id']==3)?' selected':"")." >Percussion</option>
								<option value='4'".(($row['category_id']==4)?' selected':"")." >Strings(Bowed)</option>
								<option value='5'".(($row['category_id']==5)?' selected':"")." >Strings(Plucked)</option>
								<option value='6'".(($row['category_id']==6)?' selected':"")." >Woodwind</option>
							</select>
						</div><br>
						Image Source:<br><input type='file' class='form-control' name='image' id='image_$row[id]'><br>
						Product Description<br><textarea class='form-control' name='desc' id='desc_$row[id]'>$row[product_desc]</textarea>
						<button type='submit' class='btn btn-info'>Submit</button>
        </div>
      </div>
     </form>
    </div>

 	 </div>
	</div> <!-- end Modal -->
		";
	}
}

echo "</tbody></table>
              </div>";
 ?>

 <div id="Modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			 	<button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
				<h4 class="modal-title">New Product</h4>
			</div><!-- end modal header -->
			<div class="modal-body text-left">
					<form action="action/addProducts.php" method="POST" enctype="multipart/form-data">
						Product Name:<br><input type="text" class="form-control" name="product" required><br>
						Price:<br> <input type="number" class="form-control" name="price" required><br>
						Category Id: <br>
						<div class="form-group">
							<select class="form-control" id="category" name="category" required>
								<option value="1">Brass</option>
								<option value="2">Keyboard</option>
								<option value="3">Percussion</option>
								<option value="4">Strings(Bowed)</option>
								<option value="5">Strings(Plucked)</option>
								<option value="6">Woodwind</option>
							</select>
						</div><br>
						Image Source:<br><input type="file" class="form-control" name="image" required><br>
						Product Description<br><textarea class="form-control" name="desc" required></textarea>
						<button type="submit">Submit</button>
					</form>
			</div><!-- end modal-body -->
		</div><!-- end modal-content -->
	</div><!-- end modal-dialog -->
</div><!-- end myModal -->
</div><!-- end container -->


<?php include "includes/bottom.php"; ?>