<?php
include('database.php');
//include('session.php');
    $msg ='';
    $jname=$_POST["jname"];
    //$vid=$_POST["vid"];
    $jtype=$_POST["jtype"];
    $jprice=$_POST["jprice"];
    $jdesc=$_POST["jdesc"];
    $jd=$_FILES["jd"];
    $vendor=$_POST["vendor"];
    
    

$filetmp = $_FILES['jd']['tmp_name'];
        $filename =$_FILES['jd']['name'];
        $filetype = $_FILES['jd']['type'];
        $filepath = "uploads/".$filename;
        move_uploaded_file($filetmp, $filepath);
$query="INSERT INTO product_items(product_name,product_type,product_dec,product_price,image_url,vendor_username) 
values('$jname','$jtype','$jdesc','$jprice','$filepath','$vendor')";

$result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Inserted';
    }else{
        echo 'Record not done';
    }        
?>
