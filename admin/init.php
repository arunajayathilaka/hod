<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lastdb";
	//$_SESSION['username']="mythree";
	// Create connection
$conn=@mysqli_connect("$servername","$username","$password");
@mysqli_select_db($conn,"$dbname") or die("couldn't connect db");
	
?>