<?php

require_once 'init.php';



$name = $_POST['uname'];
$email = $_POST['cemail'];
$cpwd = $_POST['cpwd'];
$npwd = $_POST['npwd'];

$id_email = "select `id` from customerlogin where email = '{$_SESSION['email']}'";
$id_run = mysqli_query($link,$id_email);
$row = mysqli_fetch_assoc($id_run);
$id = $row['id'];

if(!(empty($cpwd))){

	$query = "select password from customerlogin where email='{$_SESSION['email']}'";
	$query_run = mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($query_run);
	$pw = $row['password'];
	if ($pw != $cpwd) {
		echo "password incorrect!";
		exit();
	}else{

		$sql1 = "update customerlogin set username = '$name' where id = '$id'";
		if(mysqli_query($link,$sql1)){
			//echo "done";
			$_SESSION['username'] = $name;
			

		}else{
			exit();
		}

		$sql2 = "update customerlogin set email = '$email' where id = '$id'";
		$runn = mysqli_query($link,$sql2);
		$sql_new = "select email from customerlogin where id = '$id'";
		$new_run = mysqli_query($link,$sql_new);
		$new_row = mysqli_fetch_assoc($new_run);
		$new_email = $new_row['email'];

		$sql_uname = "select username from customerlogin where id = '$id'";
		$new_run2 = mysqli_query($link,$sql_uname);
		$new_row2 = mysqli_fetch_assoc($new_run2);
		$new_uname = $new_row2['username']; 

		//$_SESSION['email'] = $email;
		//echo $_SESSION['email'];

		$sql3 = "update customerlogin set password = '$npwd' where id = '$id'";
		mysqli_query($link,$sql3);
		echo "<script>alert('successfully changed!');</script>";
		echo "$new_uname";
		echo "<br/>";
		echo "$new_email";

		//print_r($_SESSION);

	}

}else{
	echo "enter your current password";
	exit();
}

//print_r($_SESSION);


?>