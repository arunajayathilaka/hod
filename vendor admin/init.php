<?php
	
	$servername = "localhost";
	$mysqlusername = "root";
	$password = "";
	$dbname = "houseofdiamante";
	$con = mysqli_connect("$servername","$mysqlusername","$password");
	$db = mysqli_select_db($con ,"$dbname") or die("couldn't connect db");
	
?>