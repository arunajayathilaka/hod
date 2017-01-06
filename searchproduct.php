<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'init.php';

if(isset($_POST['sname'])){
    $sname=$_POST['sname'];
    $sname=preg_replace("#[^0-9a-z]#i","",$sname);

    $sql=mysqli_query($link,"SELECT * FROM product_items WHERE product_items.product_name LIKE '%{$sname}%'");
    while($row=mysqli_fetch_array($sql)){
	$products[]=$row;
    }
    if(mysqli_num_rows($sql)>0){
    foreach($products as $product1){
    echo '
	<div class="col-xs-12 col-sm-4 col-lg-3 col-md-4">
            <div class="thumbnail" style="background-color: rgba(230,238,255,0.5); border: 1px solid #218dfb;">
		<img src="'. $product1['image_url'].'" style="height:30%;" alt="">
		<div class="caption">
                    <h4 class="pull-right">'.$product1['product_price'].'</h4>
                    <h4><a style="color:white;"href="#">'.$product1['product_name'].'</a>
                    </h4>
                    <p>'.$product1['product_dec'].'</p>
		</div>
								
            <div>
            <form role="form">
		<div class="checkbox">
                    <label><input id="compare" type="checkbox" value="'.$product1['product_name'].'">compare</label>
		</div>
            </form>
            </div>
	</div>
	</div>
    ';
}
    
                
}
else{
    echo 'search not available';
}
}


?>