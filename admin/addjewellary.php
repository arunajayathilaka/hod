<?php
include('database.php');
//include('session.php');
    $msg ='';
    if(isset($_POST["jname"])){
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
        $filepath = "../img/vendor images/".$vendor."/".$filename;
        $filepath2 ="../img/vendor images/".$vendor;
        $filepath3="img/vendor images/".$vendor."/".$filename;
        if(!is_dir($filepath2)){
            mkdir($filepath2);
        }
        move_uploaded_file($filetmp, $filepath);
$query="INSERT INTO product_items(product_name,product_type,product_dec,product_price,image_url,vendor_username) 
values('$jname','$jtype','$jdesc','$jprice','$filepath3','$vendor')";

$result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Inserted';
        header("Location: index.php");
    }else{
        echo 'Record not done';
    }
    }
?>
