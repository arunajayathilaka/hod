<?php 
require_once'init.php' ;


if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['phone_n']) && isset($_POST['carrot_w']) && isset($_POST['ring_s']) && isset($_POST['metal']) &&isset($_POST['gemstone']) && isset($_POST['centercut']) && isset($_POST['image_url']) && isset($_POST['vendor'])){
	$fullname = $_POST['fullname'];
	$email=$_POST['email'];
	$phone_n=$_POST['phone_n'];
        $username=$_SESSION['username'];
	$carrot_w=$_POST['carrot_w'];
	$ring_s=$_POST['ring_s'];
	$metal=$_POST['metal'];
	$gemstone=$_POST['gemstone'];
	$centercut=$_POST['centercut'];
	$image_url=$_POST['image_url'];
        $vendor=$_POST['vendor'];

$sql3q=mysqli_query($link," INSERT INTO quotation(id,full_name,mobile_num,email,username,ring_size,carrot_w,metal,gemstone,center_cut,image_url,vendor,view,item_type)
 values (null,'$fullname','$phone_n','$email','$username','$ring_s','$carrot_w','$metal','$gemstone','$centercut','$image_url','$vendor','no','ring')");


if($sql3q){
	echo 'SUCCESS';
}
else{
	echo 'NOT_SUCCESS';
}

}
else{
	echo 'NOT_SET';
}
?>