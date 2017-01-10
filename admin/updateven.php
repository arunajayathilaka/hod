<?php
    include('database.php');
        
    $vid = $_POST['vid'];
    $vname = $_POST['vname'];
    $vmail = $_POST['vmail'];
    $vtel =  $_POST['vtel'];
    $vadd = $_POST["vadd"];
    $uname = $_POST['uname'];
    $vpass = $_POST['vpass'];
    $logo = $_FILES['logo'];


    $filetmp = $_FILES['logo']['tmp_name'];
        $filename =$_FILES['logo']['name'];
        $filetype = $_FILES['logo']['type'];
        $filepath = "uploads/".$filename;
        move_uploaded_file($filetmp, $filepath);
    
    $query = "UPDATE vendor SET vendor_name ='{$vname}',vendor_email = '{$vmail}', vendor_username = '{$uname}', vendor_password = '{$vpass}', image_url = '{$filepath}', telephone = '{$vtel}', vAddress = '{$vadd}' WHERE id = '{$vid}'" ;
   // mysqli_select_db($conn,'hod');
    //$retval = mysql_query( $sql, $conn );
            
    $result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Edited';
    }else{
        echo'Record not done';
    }
    
    ?>