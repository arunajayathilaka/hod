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
			echo '
				<div class="col-md-6">
								<div class="text-center">
									<img src="'.$product1['image_url'].'" style="height:30%" alt="">
									<div class="caption">
										<h4 class="">'.$product1['product_price'].'</h4>
										<h4><a href="#">'.$product1['product_name'].'</a>
										</h4>
										<p>'.$product1['product_dec'].' </p>
									</div>
									
									<div>
									</div>
								</div>
							</div>
			';
		}
	}
	else{
		echo '<p>not found</p>';
	}
}
?>