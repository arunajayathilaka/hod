<?php

	require_once('init.php');
	


	if(isset($_POST["submit"])){
		$email = $_POST["email"];
		$pw = $_POST["password"];
		
		
		$sqluser = "select * from `admin` where `admin_email`='$email' and `password` = '$pw'";
		$result = mysqli_query($conn,$sqluser);
		if(mysqli_num_rows($result)==1){
			
				header("Location: index.php");
			}
			else{

                echo "<script>
                       alert('Sorry you do not have an account. Please Sign up!!');
                       window.location.href='login.php';
                      </script>";

		}
	}



?>