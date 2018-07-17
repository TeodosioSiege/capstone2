<?php 
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$psw = sha1($_POST['psw']);
$pswRepeat = sha1($_POST['psw-repeat']);
$fullName = "$fname"." "."$lname";
//echo "$fullName";
//echo "$psw<br>$pswRepeat";

//echo $email;
if ($psw == $pswRepeat) {
	include "../includes/db_config.php";
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
				header("location:../index.php?regX=1");
	}else{

$sql = "INSERT INTO users (email,password,name,role) VALUES ('$email','$psw','$fullName','User')";
$result = mysqli_query($conn,$sql);
	if ($result) {
		$sql2 = "SELECT * FROM users WHERE email = '$email' AND password = '$psw'";

		$result2 = mysqli_query($conn,$sql2);

		if (mysqli_num_rows($result2) > 0) {
			while ($row = mysqli_fetch_assoc($result2)) {
				//echo $row['name'];
				session_start();
				$_SESSION["id"] = $row["id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["email"] = $row["email"];
				$_SESSION["role"] = $row["role"];
				header("location:../index.php?reg=1");
			} //end while
		}//end if  result2
	} //end if result
	} //end else  find email

	} //pswif  
	else{
		header("location:../index.php?pswX=1");
	}
 ?>
