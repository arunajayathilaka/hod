<?php
require_once 'init.php';

if(isset($_POST['shopvendor']) && isset($_POST['type'])){
		
	$shopvendor=$_POST['shopvendor'];
	$type=$_POST['type'];
	$productQuery=mysqli_query($link,"SELECT product_items.product_name,product_items.product_dec,product_items.product_price,product_items.image_url FROM product_items WHERE product_items.vendor_username='{$shopvendor}' AND product_items.product_type='{$type}'");

	while($row=mysqli_fetch_array($productQuery)){
		$products[]=$row;
	}
	if(@count($products) != 0 ){
		foreach($products as $product1){
			echo '
				<div class="col-sm-4 col-lg-4 col-md-4">
								<div class="thumbnail"style="background-color: rgba(230,238,255,0.5); border: 1px solid #218dfb;">
									<img src="'.$product1['image_url'].'" style="height:30%; alt="">
									<div class="caption">
										<h4 class="pull-right">'.$product1['product_price'].'</h4>
										<h4><a style="color:white;" href="#">'.$product1['product_name'].'</a>
										</h4>
										<p>'.$product1['product_dec'].' </p>
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
		echo '<p style="color:white;">not found</p>';
	}
}
else{
	echo'<p style="color:white;">select the vendor</p>';
}
?>