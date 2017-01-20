<?php
	include ('database.php');
    if(isset($_POST['id'])){
        $data =$_POST['id'];
        foreach($data as $d){
            $sql12 = "DELETE  FROM vendor WHERE vendor_username = '{$d}' ";
            mysqli_query($conn,$sql12);
        }
        //echo "hari";
    }
?>