<?php
include('database.php');
//include('session.php');
    $msg ='';
    if(isset($_POST["vname"])){
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
        $filepath = "../img/als-images/".$filename;
        $filepath2="img/als-images/".$filename;
        move_uploaded_file($filetmp, $filepath);
$query="INSERT INTO vendor(vendor_name,vendor_email,vendor_username,vendor_password,image_url,telephone,vAddress) 
values('$vname','$vmail','$uname','$vpass','$filepath2','$vtel','$vadd')";

$result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Inserted';
        header("Location: index.php");
    }else{
        echo 'Record not done';
    }
    }
?>





