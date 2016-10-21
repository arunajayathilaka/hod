<?php
	require_once 'init.php';
	require_once 'updateRate.php';
	
	if(isset($_POST['shopvendor'])){
		$shopvendor=$_POST['shopvendor'];
		$display=updaterate($shopvendor);
		echo''.$display.'';
	}
?>