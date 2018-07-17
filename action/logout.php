<?php 
//logout.php
session_start();

//remove all session variables

session_unset();

//destroy the session

session_destroy();

//echo "You've been Logged Out<br>Go back to <a href=index.php>Main Page</a>";
header("location:../index.php?logOut=1");

 ?>