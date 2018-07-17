<?php session_start();

$product = $_POST['product'];
$price = $_POST['price'];
$category = $_POST['category'];
$desc = $_POST['desc'];
//echo "$product-$price-$category-$image-$desc";

//code for file upload


$target_dir = "../assets/img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//echo "$imageFileType";


    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {        
        $uploadOk = 1;
    } else {
        echo "File is not an image.<a href='../updateProducts.php'>back</a><br>";
        $uploadOk = 0;
    }
// Check file size
if ($_FILES["image"]["size"] > 10000000) {
    echo "Sorry, your file is too large.<a href='../updateProducts.php'>back</a><br>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<a href='../updateProducts.php'>back</a><br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
     if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
 include "../includes/db_config.php";
$image = "assets/img/". basename($_FILES["image"]["name"]);
$sql= "INSERT INTO items (product_name,price,category_id,image,product_desc) VALUES ('$product','$price','$category','$image','$desc')";

$result = mysqli_query($conn,$sql);

if ($result) {
	header('location: ../updateProducts.php?insert=1');
}
    }

}

 ?>
