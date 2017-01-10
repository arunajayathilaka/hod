<?php
	include ('database.php');
    if(isset($_POST['item_id'])){
        $data =$_POST['item_id'];
        foreach($data as $d){
            $sql12 = "DELETE  FROM product_items WHERE item_id = $d ";
            mysqli_query($conn,$sql12);
        }
    }
?>