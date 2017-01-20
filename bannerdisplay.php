<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'init.php';

if(isset($_POST['shopvendor'])){
	$detail=array();	
	$shopvendor=$_POST['shopvendor'];
        
        $detailQuery=mysqli_query($link,"SELECT * FROM advertisingimage WHERE vendor='{$shopvendor}'");

      $detail=mysqli_fetch_assoc($detailQuery);
		
        
        
        echo json_encode( $detail );
        
}
?>