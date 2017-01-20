<?php

require_once 'init.php';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = 'img/users/'.$_SESSION['username']; // upload directory

if(is_dir($path)==false){
    mkdir($path);
}
$path=$path.'/';
if(isset($_FILES['image']))
{
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];
		
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	
	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	
			
		if(move_uploaded_file($tmp,$path)) 
		{
			$quer_upload = "update customerlogin set pro_pic = '$path' where email='{$_SESSION['emailn']}'";
			if($upload_run = mysqli_query($link,$quer_upload)){
				echo '<img src="'.$path.'" style="height:200px; width:200px;"/>';
				//echo $upload_run;
			}
		}
	} 
	else 
	{
		echo 'invalid';
	}
}


?>