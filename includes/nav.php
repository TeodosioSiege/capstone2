<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand musicore" href="index.php">&#9835;Musicore</a>
		</div><!-- end navbar-header-->
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li <?php if (stripos($_SERVER['REQUEST_URI'],'index.php') !== false) {echo 'class="active"';} ?>><a href="index.php">Home</a></li>
				<?php if ($_SESSION["role"] == "User") {
					echo "<li ";
					if (stripos($_SERVER['REQUEST_URI'],'order.php') !== false) {echo 'class="active"';}
					echo "><a href='order.php'>Orders</a></li>";
				} ?>	<!-- different page for different role	 -->		
				<?php if ($_SESSION["role"] == "Admin") {
					echo "<li ";
					if (stripos($_SERVER['REQUEST_URI'],'updateProducts.php') !== false) {echo 'class="active"';}
					echo "><a href='updateProducts.php'>Update Products</a></li>
						  <li ";
					if (stripos($_SERVER['REQUEST_URI'],'mngOrder.php') !== false) {echo 'class="active"';}
					echo "><a href='mngOrder.php'>Manage Orders</a></li>
					";
				} ?>
				
	 		</ul><!-- end navbar-nav-->
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['id'])) {
					$name = $_SESSION['name'];
					echo "<li><a href=#>Welcome $name !</a></li>";
				} ?>
				<li <?php if (stripos($_SERVER['REQUEST_URI'],'cart.php') !== false) {echo 'class="active"';} ?> ><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Shop <?php 
        		if (isset($_SESSION["item_count"])) {
					echo "<span class='badge'>".$_SESSION["item_count"]."</span>";
       			 }?></a></li>
       			 <?php if (!isset($_SESSION['id'])) {
       			 	echo "
				<li><a href='#'  data-toggle='modal' data-target='#myModal' onclick=openForm(event,'Sign-Up')><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
				 <li><a href='#'  data-toggle='modal' data-target='#myModal' onclick=openForm(event,'Log-in')><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
       			 	";
       			 } else {
       			 	echo "
       			 <li><a href='action/logout.php'>LogOut</a></li>
       			 	";
       			 }?>

			</ul><!-- end navbar-right-->
		</div><!-- end navbar collapse -->
	</div><!-- end container-fluid-->
</nav>
<!--end nav-->

 

<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			 	<button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
				<h4 class="modal-title musicore">&#9835; Musicore</h4>
			</div><!-- end modal header -->
			<div class="modal-body">
				<div class="tab">
					<button class="tablinks" onclick="openForm(event, 'Sign-Up')">Sign-Up</button>
					<button class="tablinks" onclick="openForm(event, 'Log-in')">Log-in</button>
				</div><!-- end tab -->
				<!-- Tab content -->
					<div id="Sign-Up" class="tabcontent">
					<!--sign up form -->
						 <div class="container-fluid">
						 	<form action="action/register.php" method="POST">
							<h3>Sign Up</h3>
							 <p>Please fill in this form to create an account.</p>
							<hr>
							 <label for="email"><b>Email</b></label>
							 <input type="text" placeholder="Enter Email" name="email" required class="form-control">
							 <label for="fname"><b>First Name</b></label>
							 <input type="text" placeholder="Enter First Name" name="fname" required class="form-control">
							 <label for="lname"><b>Last Name</b></label>
							 <input type="text" placeholder="Enter Last Name" name="lname" required class="form-control">
							 <label for="psw"><b>Password</b></label>
							 <input type="password" placeholder="Enter Password" name="psw" required class="form-control">
							 <label for="psw-repeat"><b>Repeat Password</b></label>
							 <input type="password" placeholder="Repeat Password" name="psw-repeat" required  class="form-control">
							 <label>
							 <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
							</label>
							<p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
							<div class="clearfix">
								<button type="submit" class="btn btn-primary">Sign Up</button>
							</div><!-- end clearfix -->
							</form>
						</div><!-- end container-fluid -->
					</div><!-- end sign-up -->
					<div id="Log-in" class="tabcontent">
						<!--log in form -->
						<form action="action/action_users.php" method="POST">
							<div class="container-fluid">
								<h3>Log in</h3><hr>
								<label for="email"><b>Email</b></label>
								<input type="text" placeholder="Enter Username" name="email" required class="form-control"><div class="form-group">
								<label for="psw"><b>Password</b></label>
								<input type="password" placeholder="Enter Password" name="psw" required class="form-control"></div><div class="form-group">
								<button type="submit" class="btn btn-primary">Login</button></div>
							</div><!-- end container-fluid -->
						</form>
					</div><!-- end login -->
			</div><!-- end modal-body -->
		</div><!-- end modal-content -->
	</div><!-- end modal-dialog -->
</div><!-- end myModal -->