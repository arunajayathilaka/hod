<?php
require_once 'init.php';

$vendorQuery=mysqli_query($conn,"SELECT vendor.vendor_name,vendor.id,vendor.vendor_email,vendor.image_url,vendor.vendor_username,vendor.vendor_password,vendor.telephone,vendor.vAddress FROM vendor");

while($row=mysqli_fetch_array($vendorQuery)){
	$vendors[]=$row;
}

?>