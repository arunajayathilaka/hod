<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//ob_start();
require_once'init.php';
?>
<html>
<head>
<title>HOD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="css/index.css">-->
  
	
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" href="css/slider.css">
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

 
</head>
<body style="/*background-image:url(img/bg5.jpg);*/ background-color:#E1E1E1;background-size: 100% 100%;">
	
		
			<?php 
			if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
			else{$_SESSION['er1']="false";}?>
			<?php include("template/menu.php"); ?>
		
	   
			<?php include 'template/headnav.php';?>
		
		
		
			
				
    		<div class="row">
                    <?php include("template/slider.php"); ?>
                    <!--
				<div class="col-sm-12" id="slider1">
					<a href="#">
						<img src="img/sliders/slider1.jpg" />
					</a>
					<a href="#">
						<img src="img/sliders/slider2.jpg"/>
					</a>
					<a href="#">
						<img src="img/sliders/slider3.png"/>
					</a>
					<a href="#">
						<img src="img/sliders/slider4.jpg"/>
					</a>
					
				</div>
                    -->
			</div>
		
    <div class="row">
        <div class="text-center" style="">
        <h1>Our Service<h1> 
                </div>
    </div>
		<div class="row row-centered" id="detail">
					<div class="col-sm-4 text-center"  id="photohubdetail">
						<h2 class="text-center" style="color:#100c3e;">Photohub</h2>
					<p class="text-center"style="padding-left:0px; color:#1b1464;">
						Photohub is the place where people can upload images to it.and knowing about new jewellery trends.
					</p>
					<img src="img/photohubs.png" style="height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block" id="imgs"/>
					</div>

					<div class="col-sm-4 "  id="designdetail">
						<h2 class="text-center" style="color:#100c3e;">Design</h2>
						<p class="text-center" style="padding-left:0px; color:#1b1464;">
						Design is the platform that people can recreate jewellery as they prefered.
						</p>
						<img src="img/design.png" style="height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block" id="imgs"/>
					</div>
					<div class="col-sm-4 text-center"  id="vrdetail">
						<h2 class="text-center" style="color:#100c3e;">Vitual Mirror</h2>
						<p class="text-center" style="padding-left:0px;color:#1b1464;">
						Vmirror is the place where people can try out jewellery in virtual enviroment.</p>
						<img src="img/vr.png" style="height:30%; opacity:0.8;visibility:visible;animation-name:bounceIn;animation-duration: 4s;" class="img-responsive center-block"id="imgs" />
						
					</div>
				</div>
				
	
    <footer class="container1" style="">
		<?php include 'template/footer.php';?>	
	</footer>

<script src="js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/slider.js"></script>
<script src="js/scroll.js"></script>
<script>
    $(function(){
//$('#bs-carousel').carousel();
    });
</script>

</body>
</html>

