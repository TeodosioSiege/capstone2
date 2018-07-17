<?php 
$email = $_POST['email'];
$psw = sha1($_POST['psw']);

//echo "$email<br>$psw";
include "../includes/db_config.php";

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$psw'";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//echo $row['name'];
		session_start();
		$_SESSION["id"] = $row["id"];
		$_SESSION["name"] = "$row[name]";
		$_SESSION["email"] = $row["email"];
		$_SESSION["role"] = $row["role"];
		header("location:../index.php");
	}
} else{
	header("location:../index.php?logX=1");
}
 ?>