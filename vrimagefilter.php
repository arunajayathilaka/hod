<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'init.php';

if(isset($_POST['jeweltype']) && isset($_POST['vendor'])){
		
	$jeweltype=$_POST['jeweltype'];
	$vendor=$_POST['vendor'];
	
        if($jeweltype==="jeweltype" && $vendor!="vendor"){
            $productQuery=mysqli_query($link,"SELECT * FROM vr WHERE vendor_name='{$vendor}'");
        }
        else if($jeweltype!="jeweltype" && $vendor==="vendor"){
            $productQuery=mysqli_query($link,"SELECT * FROM vr WHERE product_type='{$jeweltype}'");
        }
        else if($jeweltype!="jeweltype" && $vendor!="vendor"){
            $productQuery=mysqli_query($link,"SELECT * FROM vr WHERE vendor_name='{$vendor}' AND product_type='{$jeweltype}'");
        }
	

	while($row=mysqli_fetch_array($productQuery)){
		$vrs[]=$row;
	}
	if(@count($vrs) != 0 ){
		foreach($vrs as $vr){
                    echo' 
                        <div class="thumbnail caption1 transthumb text-center" style="height:auto; width:100px;  margin:auto; margin-bottom:15px;">
                            <a id="" value="'.$vr['image'].'" role="button"><img src="'.$vr['image'].'" style="height:100;width:100" alt=""></a>							
			</div>
                ';
                    
			
		}
	}
	else{
		echo '<p>not found</p>';
	}
}


?>