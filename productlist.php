<?php
require_once 'init.php';

function listall(){
$link=new mysqli("localhost","root","","lastdb");
$productQuery=mysqli_query($link,"SELECT product_items.product_name,product_items.item_id,vendor.vendor_name,product_items.product_dec,product_items.product_price,product_items.image_url FROM product_items LEFT JOIN vendor ON product_items.vendor_username=vendor.vendor_username");

while($row=mysqli_fetch_array($productQuery)){
	$products[]=$row;
}

foreach($products as $product1){
    echo '
	<div class="col-xs-12 col-sm-4 col-lg-3 col-md-4">
            <div class="thumbnail" style="background-color: rgba(230,238,255,0.5); border: 1px solid #218dfb;">
		<img src="'. $product1['image_url'].'" style="height:30%;" alt="">
		<div class="caption">
                    <div style="height:50px; ">
                    <h4 class="pull-right" style="margin-top: 0px;">'.$product1['product_price'].'</h4>
                    <h4><a style="color:black; top:0; text-decoration: none !important; cursor:pointer;" value="'.$product1['item_id'].'">'.$product1['product_name'].'</a></h4>
                    </div>
                    <span class="label label-default" style="margin-top:5px;">'.$product1['vendor_name'].'</span>
                    <p style="padding-top: 10;">'.$product1['product_dec'].'</p>
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
return 0;
}
?>