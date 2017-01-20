<?php
//session_start();
require_once 'init.php';

// Check connection

if (isset($_POST['email']) && isset($_POST['pass'])) {
    // collect value of input field
	
    $email = $_POST["email"];
    $password=md5($_POST["pass"]);
	



//make a query for selecting email that user entered
//$link=new mysqli("localhost","root","","houseofdiamante");
$result = mysqli_query($link,"SELECT * FROM customerlogin WHERE email='{$email}'");
$er=true;
while ($row = mysqli_fetch_array($result))
{	
	$er=false;
        if($password==$row['password']){
        	$_SESSION['er']="true";
                $_SESSION['emailn']=$email;
                $_SESSION['username']=$row['username'];
                
                echo "U_AND_P_C";
                //header("Location: index.php");
        }
        else{
        	
            echo "USERNAME_OR_PASSWORD_INCORRECT";
        }
	
}
if($er){
    
    echo "USER_NOT_AB";
}

    mysqli_close($link);
    session_commit();
}
else{
    echo 'not set';
}
?>