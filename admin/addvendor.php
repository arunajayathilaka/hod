<?php
include('database.php');
//include('session.php');
    $msg ='';
    $vname=$_POST["vname"];
    //$vid=$_POST["vid"];
    $vmail=$_POST["vmail"];
    $vtel=$_POST["vtel"];
    $vadd=$_POST["vadd"];
    $uname=$_POST["uname"];
    $vpass=$_POST["vpass"];
    $image_url=$_FILES["image_url"];
    

$filetmp = $_FILES['image_url']['tmp_name'];
        $filename =$_FILES['image_url']['name'];
        $filetype = $_FILES['image_url']['type'];
        $filepath = "uploads/".$filename;
        move_uploaded_file($filetmp, $filepath);
$query="INSERT INTO vendor(vendor_name,vendor_email,vendor_username,vendor_password,image_url,telephone,vAddress) 
values('$vname','$vmail','$uname','$vpass','$filepath','$vtel','$vadd')";

$result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Inserted';
    }else{
        echo 'Record not done';
    }        
?>





