<?php
require_once 'init.php';
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Virtual Mirror</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="css/listscroller.css" >-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	.clickable{
		cursor: pointer;   
	}

	.panel-heading span {
		margin-top: -20px;
		font-size: 15px;
	}
	
	.selected{
		box-shadow:0px 12px 22px 1px #333;
		opacity: 0.5;
		filter: alpha(opacity=50);
	}

	</style>
</head>

<body style="background-color:#E1E1E1;background-size: 100% 100%;">
		
		<?php 
		if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
		else{$_SESSION['er1']="false";}?>
		<?php include 'template/menu.php' ?>
		
		<?php include 'template/headnav.php';?> 

    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<div class="col-md-8">
			
				<div class="panel panel-default" style="height:380px; margin-top:20px; background-color: rgba(230,238,255,0.5);">
					<div class="panel-body">
						<canvas id="display" width="715" height="345" style="position:absolute; "></canvas>
						<canvas id="photo" width="715" height="345" style="position:absolute; "></canvas>
					
						<div class="text-right">

						</div>
					</div>
					
				</div>
			</div>
			<div class="col-md-1 ">
				
					
						
						<a role="button" class="btn btn-primary btn-sm center-block" style="margin-top:80px;" id="takePhoto" value="Click"><img class="img1" src="./img/camera.png" alt="" style=""></a>
						
						<a role="button" class="btn btn-primary btn-sm center-block" style="margin-top:10px;" id="takePhoto2" value="Click"><img class="img1" src="./img/back.png" alt="" style=""></a>
						
                        <a role="button" class="btn btn-primary btn-sm center-block" style="margin-top:10px;" id="download" value="Click" onclick="downloadCanvas();"><img class="img1" src="./img/download.png" alt="" style=""></a>
                        
                        <a role="button" class="btn btn-primary btn-sm center-block" style="margin-top:10px;" id="takePhoto4" value="Click"><img class="img1" src="./img/upload.png" alt="" style=""></a>
					
			</div>
			<div class="col-md-3">			
				<div class="panel panel-default" style="height:380px; margin-top:20px;background-color: rgba(230,238,255,0.5);">
				<div class="panel-body">
					<div class="span12" style="text-align: center">
						<h1>Virtual Mirror</h1>
						<center>
						   <li>Allow the web site to use web cam</li>
						   <li>Select the jewellery you need</li>
						   <li> Selected item will place customer's appeared body part virtually (ex:-hand with the ring)</li>
                    </center>
					</div>
				</div>
				
						
			</div>
			</div>
			
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default" style="background-color: rgba(230,238,255,0.5);">
					<div class="panel-body" style="height:240px; overflow-x: scroll; overflow-y: hidden; white-space:nowrap;">
					<div id="f4">
					       <label class="span6" for="jewelleryType" style="padding-top:6px">Select Jewelry Type </label>
                       <select class="span6" id="jewelleryType" onchange='showJewellery()'>
                            <option name="jType" value="Necklace" >Necklace </option> 
                            <option  name="jType" value="Ring" >Ring </option>
                            <option   name="jType" value="Earring"  >Earring </option>
                            <option  name="jType" value="Bracelet" >Bracelet</option>

                        </select>
						<!--<div class="thumbnail text-center" style="height:auto; width:100px; display:inline-block; margin: 2px 5px 5px 5px;">-->
                    
                                
                    
					
					
					</div>
					
				</div>
			</div>
		
		</div>
       
        <!-- Footer 
        <footer class="container1">
			<div class="navbar navbar-inverse navbar-fixed-bottom navbar-custom">
				<div class="col-sm-4"></div>
				<div class="col-lg-4">
					<p>&#169Copyright -- House Of Diamante , 2016.</p>
				</div>
				<div class="col-sm-4">
					<a href=""><img class="img-responsive"src=""></a>
				</div>
			</div>
		</footer>-->

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/script1.js"></script>
	<script src="js/fabric.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		
	</script>
</body>

</html>

