<?php
	include ('database.php');
    if(isset($_POST['admin_id'])){
        $data =$_POST['admin_id'];
        foreach($data as $d){
            $sql12 = "DELETE  FROM admin WHERE admin_id = $d ";
            mysqli_query($conn,$sql12);
        }
    }
?>