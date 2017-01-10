<?php
	include ('database.php');
    if(isset($_POST['id'])){
        $data =$_POST['id'];
        foreach($data as $d){
            $sql12 = "DELETE  FROM vendor WHERE id = $d ";
            mysqli_query($conn,$sql12);
        }
    }
?>