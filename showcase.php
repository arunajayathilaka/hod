<?php
	require_once 'updateRate.php';
	require_once 'productlist.php';
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Showcase</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/showcase.css" rel="stylesheet">
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<!--<link rel="stylesheet" type="text/css" media="screen" href="css/CSSreset.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/als_demo.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/listscroller.css" >-->
		<link href="css/slick.css" rel="stylesheet">
		<link href="css/slick-theme.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/thumbnail-gallery.css" rel="stylesheet">
		<link href="css/home.css" rel="stylesheet">
		
	</head>
	 <style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
	.s{}
  </style>
	<body style="background-color:#E1E1E1;background-size: 100% 100%;">
		
		<?php 
		if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
		else{$_SESSION['er1']="false";}?>
		<?php include 'template/menu.php' ?>
		
		<?php include 'template/headnav.php';?> 
	    
		
	
		<div class="container">
			<div class="row">
				<div id="content1"  class="center slider"  style="background-color: rgba(230,238,255,0.4); height:auto; width:80%;">
					 <div class="s" value="Neha Jewellery" style="background-color:rgba(230,238,255,0.5); cursor:pointer; height:auto;padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
					  <img value="Neha Jewellery" onclick="document.getElementById('shopImage').src='img/als-images/n.png' " src="img/als-images/n.png">
					</div>
					<div class="s" value="mallika" style="background-color:rgba(230,238,255,0.5); cursor:pointer; height:auto;padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
					  <img value="mallika" onclick="document.getElementById('shopImage').src='img/als-images/h.png'" src="img/als-images/h.png">
					</div>
					<div class="s" value="cjs" style="background-color:rgba(230,238,255,0.5); cursor:pointer; height:auto; padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
					  <img value="cjs" onclick="document.getElementById('shopImage').src='img/als-images/cjs.png'" src="img/als-images/cjs.png">
					</div>
					<div class="s" value="kendra scot" style="background-color:rgba(230,238,255,0.5); cursor:pointer; height:auto; padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
					  <img value="kendra scot" onclick="document.getElementById('shopImage').src='img/als-images/ks.png'" src="img/als-images/ks.png">
					</div>
					<div class="s" value="ambika jewellers" style="background-color:rgba(230,238,255,0.5); cursor:pointer; height:auto;padding-top:24px; padding-bottom:24px;padding-left:15px;padding-right:15px;">
					  <img value="ambika jewellers" onclick="document.getElementById('shopImage').src='img/als-images/ambika-jewellers.png'" src="img/als-images/ambika-jewellers.png">
					</div>
					
				<!---	
					<div id="lista1" class="als-container">
						<span class="als-prev"><img src="img/listscroller/thin_left_arrow_333.png" alt="prev" title="previous" /></span>
						<div class="als-viewport" id="vendorlt">
							<ul class="als-wrapper">
								<li class="als-item" value="Neha Jewellery" style="background-color:rgba(230,238,255,0.5); padding-bottom:24px;padding-left:15px;padding-right:15px;"onclick="document.getElementById('shopImage').src='img/als-images/n.png'"><img src="img/als-images/n.png"/>Neha Jewellers</li>
								<li class="als-item" value="mallika" style="background-color:rgba(230,238,255,0.5); padding-bottom:24px;padding-left:15px;padding-right:15px;" onclick="document.getElementById('shopImage').src='img/als-images/h.png'"><img src="img/als-images/h.png"/>Mallika</li>
								<li class="als-item" value="cjs" style="background-color:rgba(230,238,255,0.5); padding-bottom:24px;padding-left:15px;padding-right:15px;" onclick="document.getElementById('shopImage').src='img/als-images/cjs.png'"><img src="img/als-images/cjs.png"/>CJS</li>
								<li class="als-item" value="kendra scot" style="background-color:rgba(230,238,255,0.5); padding-bottom:24px;padding-left:15px;padding-right:15px;" onclick="document.getElementById('shopImage').src='img/als-images/ks.png'"><img src="img/als-images/ks.png"/>Kendra Scot</li>
								<li class="als-item" value="ambika jewellers" style="background-color:rgba(230,238,255,0.5); padding-bottom:24px;padding-left:15px;padding-right:15px;" onclick="document.getElementById('shopImage').src='img/als-images/ambika-jewellers.png'"><img src="img/als-images/ambika-jewellers.png"/>Ambika Jewellers</li>
								<!--<li class="als-item"><img src="images/als-images/cut.png" alt="scissors" title="scissors" />scissors</li>
								<li class="als-item"><img src="images/als-images/heart.png" alt="heart" title="heart" />heart</li>
								<li class="als-item"><img src="images/als-images/map.png" alt="pin" title="pin" />pin</li>
								<li class="als-item"><img src="images/als-images/mobile_phone.png" alt="mobile phone" title="mobile phone" />mobile phone</li>
								<li class="als-item"><img src="images/als-images/camera.png" alt="camera" title="camera" />camera</li>
								<li class="als-item"><img src="images/als-images/music_note.png" alt="music note" title="music note" />music note</li>
								<li class="als-item"><img src="images/als-images/protection.png" alt="umbrella" title="umbrella" />umbrella</li>
								<li class="als-item"><img src="images/als-images/television.png" alt="television" title="television" />television</li>-->
								<!--
							</ul>
						</div>
						<span class="als-next"><img src="img/listscroller/thin_right_arrow_333.png" alt="next" title="next" /></span>
					</div>
					-->
				</div>
			</div>
			<div class="row">
				<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog modal-lg">
						
						  <!-- Modal content-->
						  <div class="modal-content" style="background-color: rgba(230,238,255,1);">
							<div class="modal-header">
							 
							  <h4 class="modal-title">Compare</h4>
							</div>
							<div class="modal-body">
								<div id="compareitem" class="row">
								<div class="col-md-6">
									<div class="thumbnail">
										<img src="http://placehold.it/320x150" alt="">
										
									</div>
								</div>
							
							<div class="col-md-6">
								<div class="thumbnail">
									<img src="http://placehold.it/320x150" alt="">
									
								</div>
							</div>
							</div>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-info" onclick="btnfunc()">Close</button>
							</div>
						  </div>
						  
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
						
							<form class="navbar-form" role="search">
								<div class="input-group">
								  <input class="form-control" style="color:"placeholder="Search">
								  <div class="input-group-btn">
									<button class="btn btn-info" type="button">GO!</button>
									
								  </div>
								 
								</div>
								 <button id="comparenow" class="btn btn-info pull-right" type="button" data-toggle="modal" data-target="#myModal" disabled>Compare Now</button>
							</form>
							
						
						<hr>
						</div>
						<div id="productlist">
						<?php foreach($products as $product1):?>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail" style="background-color: rgba(230,238,255,0.5); border: 3px solid #218dfb;">
								<img src="<?php echo $product1['image_url']; ?>" style="height:30%;" alt="">
								<div class="caption">
									<h4 class="pull-right"><?php echo $product1['product_price']; ?></h4>
									<h4><a style="color:white;"href="#"><?php echo $product1['product_name']; ?></a>
									</h4>
									<p><?php echo $product1['product_dec']; ?></p>
								</div>
								
								<div>
									<form role="form">
										<div class="checkbox">
										  <label><input id="compare" type="checkbox" value="<?php echo $product1['product_name']; ?>">compare</label>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						</div>
					</div>
					
					<div class="col-md-4">
						 <p id="lead" class="lead" style="color:white;">Shop Name</p>
							<div class="thumbnail" style="height:250px;background-color: rgba(230,238,255,0.5);  width:250px;border: 3px solid #218dfb;">
                            <img id="shopImage" src="img/selectv.png" alt="">
							</div>
							<div class="ratings" >
                                
                                <div>
									<div id="1" class="rate-btn"><span class="rate-btn-1 icon"></span></div>
									<div id="2" class="rate-btn"><span class="rate-btn-2 icon"></span></div>
									<div id="3" class="rate-btn"><span class="rate-btn-3 icon"></span></div>
									<div id="4" class="rate-btn"><span class="rate-btn-4 icon"></span></div>
									<div id="5" class="rate-btn"><span class="rate-btn-5 icon"></span></div>
								</div>
								<div id="rate">
								</div>
                            </div>
							<div id="type" class="list-group">
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5); cursor:pointer; margin-bottom:10px;" value="ring">Rings</a>
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5);cursor:pointer; margin-bottom:10px;" value="earings">Earings</a>
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5);cursor:pointer; margin-bottom:10px;" value="neckles">Neckles</a>
							</div>
					</div>
					
			</div>
		
		</div>
	<footer class="container1">
		<?php include 'template/footer.php';?>		
	</footer>
	
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	 <script src="js/slick.js" type="text/javascript"></script>
		<!--<script type="text/javascript" src="js/jquery.als-1.7.min.js"></script>-->
		<script src="js/bootstrap.min.js"></script>
		
		<script src="js/productfilter.js"></script>
		<script type="text/javascript">
		function btnfunc(){
			comparenow.disabled=true; 
			$( "input[type='checkbox']" ).prop({disabled:false});
			$( "input[type='checkbox']" ).prop({checked:false});
			$('#myModal').modal('hide');
		}
	
			$(document).ready(function() 
			{
				$(".center").slick({
        
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true
       
      }
    },
    {
      breakpoint: 600,
      settings: {
	 
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });
				
			});
			
		</script>
	</body>
</html>