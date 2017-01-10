<?php
// $conn=mysql_connect("localhost","root","") or die("Could not Connect My Sql");
// mysql_select_db("sewmi",$conn)  or die("Could connect to Database");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "houseofdiamante";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
