<?php 

require_once 'init.php';

if ($_POST['id']) {
	$id = $_POST['id'];
	$delete = "delete from articles where id = '$id'";
	mysqli_query($link,$delete);
}







?>