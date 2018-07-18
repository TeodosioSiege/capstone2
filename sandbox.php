<?php session_start();

if(!isset($_SESSION["cart"])){
    // create session variable for cart
    $_SESSION['cart'] = array();
}

if(!isset($_SESSION["item_count"])){
    // create session variable for item counter
    $_SESSION['item_count'] = 0;
}
if(!isset($_SESSION["role"])){
    // create session variable for item counter
    $_SESSION['role'] = 'none';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>sandbox</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<!-- fontawesome library-->
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<!-- jquery Bootstrap plugins -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- include all compiled plugins -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<?php include "includes/nav.php"; ?>

<div class="accordion">
  <ul>
    <li tabindex="1">
      <div>
        <a href="#">
          <h2>Brass</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
    <li tabindex="2">
      <div>
        <a href="#">
          <h2>Keyboard</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
    <li tabindex="3">
      <div>
        <a href="#">
          <h2>Percussion</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
    <li tabindex="4">
      <div>
        <a href="#">
          <h2>Strings(Bowed)</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
    <li tabindex="5">
      <div>
        <a href="#">
          <h2>Strings(Plucked)</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
    <li tabindex="6">
      <div>
        <a href="#">
          <h2>Woodwind</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </a>
      </div>
    </li>
  </ul>
</div>


</body>
</html>