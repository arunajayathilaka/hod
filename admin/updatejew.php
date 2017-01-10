<?php
    include('database.php');
        
    $jid = $_POST['jid'];
    $jname = $_POST['jname'];
    $jtype=$_POST["jtype"];
    $jprice = $_POST['jprice'];
    $jdesc =  $_POST['jdesc'];
    $jd = $_FILES['jd'];
    $vendor = $_POST['vendor'];

    $filetmp = $_FILES['jd']['tmp_name'];
        $filename =$_FILES['jd']['name'];
        $filetype = $_FILES['jd']['type'];
        $filepath = "uploads/".$filename;
        move_uploaded_file($filetmp, $filepath);
    
    $query = "UPDATE product_items SET product_name ='{$jname}',product_dec = '{$jdesc}', product_price = '{$jprice}', image_url = '{$filepath}', vendor_username = '{$vendor}' WHERE item_id = '{$jid}'" ;
    //mysqli_select_db($conn,'admin');
    
            
    $result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Edited';
    }else{
        echo'Record not done';
    }
    
    
    ?>