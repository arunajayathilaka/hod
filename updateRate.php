<?php
        //require_once 'init.php';
	function updaterate($shopvendor){
        $link=new mysqli("localhost","root","","lastdb");
	$query = mysqli_query($link,"SELECT * FROM rating WHERE rating.vendor_username='{$shopvendor}'"); 
		while($data = mysqli_fetch_assoc($query)){
			$rate_db[] = $data;
			$sum_rates[] = $data['rate'];
		}
		
		if(@count($rate_db)){
			$rate_times = count($rate_db);
			$sum_rates = array_sum($sum_rates);
			$rate_value = $sum_rates/$rate_times;
			$rate_bg = ($rate_value/5)*100;
			
		}else{
			$rate_bg = 0;
		}
		return '<p><span class="label label-default">'.$rate_bg.' ratings</span></p>';
	}

?>