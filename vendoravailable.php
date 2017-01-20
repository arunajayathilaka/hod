<?php
require_once 'init.php';
	//$value =$_GET['val'];
	if(isset($_POST['usern'])){
		$usern=$_POST['usern'];
        
	$Query3=mysqli_query($link,"SELECT * FROM vendor WHERE vendor_username='{$usern}'");

while($row=mysqli_fetch_array($Query3)){
	$userrow=$row;
}
if(@count($userrow)==0){
	echo '<p style="color:green; padding-left:3px;">username ok</p>';
}
else{
	echo '<p style="color:red;padding-left:3px;">username already exist</p>';
}

	}
?>