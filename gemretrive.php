<?php
	require_once 'init.php';
	
	if(isset($_POST['gemid'])){
		$id1=(int) $_POST['gemid'];
		
	
	
	$query1 = mysqli_query($link,"SELECT * FROM gem WHERE gem.id='{$id1}'"); 
	while($data1 = mysqli_fetch_assoc($query1)){
		$gem2 = $data1;
	
	}
	
	
	if(@count($gem2) !=0){
		
		
		echo '
			<div class="span12" style="text-align: center">      
				<h1 id="gemtype"> '.$gem2['gem_name'].' </h1>
				<img style="height:100px;" src="'.$gem2['image_url'].'">
				<p> '.$gem2['gem_dec'].' </p>
			</div>
		';
		
		
	}
	else{
		echo 'not there';
	}
	}
	else{
		echo 'fggf';
	}
?>