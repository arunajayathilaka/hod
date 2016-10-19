<?php
//session_start();
require_once 'init.php';

// Check connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
	
    $email = $_POST["u"];
    $password=$_POST["p"];
	
}


//make a query for selecting email that user entered
$link=new mysqli("localhost","root","","houseofdiamante");
$result = mysqli_query($link,"SELECT * FROM customerlogin WHERE email='{$email}'");
$er=true;
while ($row = mysqli_fetch_array($result))
{	
		$er=false;
        if($password==$row['password']){
        	 $_SESSION['er']="true";
			 $_SESSION['emailn']="$email";
			 $_SESSION['username']=$row['username'];
			 header("Location: index.php");
        }
        else{
        	
			header("Location: login.php");
        }
	
}
if($er){
    
    header("Location: login.php");
}
    mysqli_close($link);
    session_commit();
?>