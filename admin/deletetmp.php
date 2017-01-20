<?php
	include ('database.php');
    if(isset($_POST['id'])){
        $data =$_POST['id'];
        foreach($data as $d1){
            $sql1 = "DELETE  FROM temp_vendor WHERE vendor_username = '{$d1}' ";
            mysqli_query($conn,$sql1);
        }
    }
?>