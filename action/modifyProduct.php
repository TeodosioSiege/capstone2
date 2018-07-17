<?php session_start(); ?>

<?php 

$id = $_GET['id'];

//echo "$id";

$product = $_POST['product'];
$price = $_POST['price'];
$category = $_POST['category'];
$desc = $_POST['desc'];
//echo "$product-$price-$category-$image-$desc";
$image = $_FILES['image']['size'];


include "../includes/db_config.php";

$sql = "select * from items where id = $id";

$result = mysqli_query($conn,$sql);
if ($image > 0) {


	if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$filepath = "../".$row['image'];
				if (unlink("$filepath")) {
					//code for file upload
						$target_dir = "../assets/img/";
						$target_file = $target_dir . basename($_FILES["image"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						//echo "$imageFileType";
					    $check = getimagesize($_FILES["image"]["tmp_name"]);
					    if($check == false || $_FILES["image"]["size"] > 10000000) {        
					        echo "File is not an image/file is too large/<a href='../updateProducts.php'>back</a><br>";
					        $uploadOk = 0;
					    }//endif $check
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 1) {
						     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
								$image = "assets/img/". basename($_FILES["image"]["name"]);
						 		$sql="UPDATE items SET product_name='$product', price='$price', category_id='$category', image='$image', product_desc='$desc' WHERE id=$id";
								$result = mysqli_query($conn,$sql);
								if ($result) {
									header("location: ../updateProducts.php?update=1");
								}//endif result
							}//endif move_uploaded
						}//endif upload 
				}//endif unlink
			}//whileend
	}//endif num_rows

}else{
	$sql="UPDATE items SET product_name='$product', price='$price', category_id='$category', product_desc='$desc' WHERE id=$id";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		header("location: ../updateProducts.php?update=1");
	}//endif result
}//else end

 ?>