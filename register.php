<?php

require_once 'init.php';

// Check connection
$confirm_code= md5(uniqid(rand()));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
	$username=$_POST["u"];
    $email = $_POST["e"];
    $password=$_POST["p"];
	$pwdhashid=md5($password);
}
//$link=new mysqli("localhost","root","","houseofdiamante");
$sql = "INSERT INTO temp_customerlogin (confirm_code,username,email,password)
VALUES ('$confirm_code','$username', '$email', '$pwdhashid')";

if(mysqli_query($link,$sql)){
		// send e-mail to ...
	$to=$email;

	// Your subject
	$subject="Your confirmation link here";

	// From
	$header='From: <arunadilshanjayathilake@gmail.com>' . "\r\n";

	// Your message
	$message="Your Comfirmation link \r\n";
	$message.="Click on this link to activate your account \r\n";
	$message.="localhost:81/hod/confirmation.php?passkey=$confirm_code";


	// send email
	$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
	echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
	echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
	echo "Cannot send Confirmation link to your e-mail address";
}



?>