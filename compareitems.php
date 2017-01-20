<?php
require_once 'init.php';

if(isset($_POST['item1']) && isset($_POST['item2'])){
		
	$itemname1=$_POST['item1'];
	$itemname2=$_POST['item2'];
	

	$productQuery=mysqli_query($link,"SELECT product_items.product_name,product_items.product_dec,product_items.product_price,product_items.image_url FROM product_items WHERE product_name='{$itemname1}' OR product_name='{$itemname2}'");

	while($row=mysqli_fetch_array($productQuery)){
		$products[]=$row;
	}
	if(@count($products) != 0 ){
		foreach($products as $product1){
                    echo' <!-- item -->
                            <div class="col-md-6 text-center">
                                <div class="panel panel-default panel-pricing">
                                    <div class="panel-heading" style="height:300px;">
                                        <img src="'.$product1['image_url'].'" style="height:70%" alt="">
                                        <h3>'.$product1['product_name'].'</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                        <p><strong>'.$product1['product_price'].'</strong></p>
                                    </div>
                                    <ul class="list-group text-center">
                                        <li class="list-group-item">'.$product1['product_dec'].'</li>
                                        <li class="list-group-item"></i> Good Materials</li>
                                        <li class="list-group-item"> price negotiable</li>
                                    </ul>
                                    <div class="panel-footer">
                                        
                                    </div>
                                </div>
                            </div>
                <!-- /item -->
                ';
                    
			
		}
	}
	else{
		echo '<p>not found</p>';
	}
}
?>