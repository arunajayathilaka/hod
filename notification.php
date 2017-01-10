<?php 
require_once 'init.php';

$not_id = $_POST['no_id'];
$query = "UPDATE `notification` SET `view` = 'yes' where `customer` = '{$_SESSION['username']}' AND `not_id` = ".$not_id.";";
if($query_run = mysqli_query($link,$query)){
	echo "viewed";

}else{
	echo "failed";
}


?>