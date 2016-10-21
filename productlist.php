<?php
require_once 'init.php';

$productQuery=mysqli_query($link,"SELECT product_items.product_name,product_items.product_dec,product_items.product_price,product_items.image_url FROM product_items");

while($row=mysqli_fetch_array($productQuery)){
	$products[]=$row;
}

?>