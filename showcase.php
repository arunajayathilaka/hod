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
		<link href="https://fonts.googleapis.com/css?family=Dosis|Belleza|Domine|Slabo+27px" rel="stylesheet"> 
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/thumbnail-gallery.css" rel="stylesheet">
		<link href="css/home.css" rel="stylesheet">
                <link href="css/listgroup.css" rel="stylesheet">
              
                <!-- bxSlider CSS file -->
                <link href="css/jquery.bxslider.css" rel="stylesheet" />
		
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
    
    .dsplay{
        display:none;
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
			<!--<div class="row" style="margin-top:25px;">
                            <ul class="bxslider">
                                    <li><img src="http://placehold.it/1200x250" /></li>
                                    <li><img src="http://placehold.it/1200x250" /></li>
                                    <li><img src="http://placehold.it/1200x250" /></li>
                                    <li><img src="http://placehold.it/1200x250" /></li>
                                </ul>
			</div>-->
                <div class="row">
                <div class="panel-group" style="margin-top:10px; margin-bottom: 5px;">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="col-md-4 col-sm-5 text-center" >
                      <select id="vendorname" class="form-control" style="max-width:300px; margin-top:8px;">
                        <option>Vendor Name</option>
                        <option value="Neha Jewellery" onclick="document.getElementById('shopImage').src='img/als-images/n.png'">Neha Jewellery</option>
                        <option value="mallika" onclick="document.getElementById('shopImage').src='img/als-images/h.png'">mallika</option>
                        <option value="cjs" onclick="document.getElementById('shopImage').src='img/als-images/cjs.png'">cjs</option>
                        <option value="kendra scot" onclick="document.getElementById('shopImage').src='img/als-images/ks.png'">kendra scot</option>
                        <option value="ambika jewellers" onclick="document.getElementById('shopImage').src='img/als-images/ambika-jewellers.png'">ambika jewellers</option>
                    </select>
                    </div>
                    <div class="col-md-5 col-sm-5 text-center">
                        <form class="navbar-form" role="search" style="max-width:329px;">
			<div class="input-group">
                            <input id="psearch" class="form-control" style="color:"placeholder="Search">
                            <div class="input-group-btn">
				    <button id="pgo" class="btn btn-info" type="button">GO!</button>
									
                            </div>
								 
			</div>
			 </form>
                    </div>
                    <div class="col-md-3 col-sm-2 text-center">
                        <button id="comparenow" class="btn btn-info" style="margin-top: 8px;" type="button" data-toggle="modal" data-target="#myModal" disabled>Compare Now</button>
                    
                    </div>
                    </div>
                 </div>
                </div>
                </div>
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left:5px; padding-right:0px;">
                            <div id="type" class="list-group list-group-horizontal" style="margin-bottom: 5px;">
                                
                                <a href="#" class="list-group-item" style="width:33.33%;text-align: center; cursor:pointer; margin-right: 1px;" value="ring">Rings</a>
                                <a href="#" class="list-group-item" style="width:33.33%;text-align: center; cursor:pointer; margin-right: 1px;" value="earings">Earrings</a>
                                <a href="#" class="list-group-item" style="width:33.33%;text-align: center; cursor:pointer;" value="neckles">Necklaces</a> 
                            </div>
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
            
                            <div>
                               <div id="vpanel" class="panel-group dsplay" style="margin-top:5px;">
                                    <div class="panel panel-default">
                                        <div class="panel-body"> 
                                            <div class="col-md-3">
                                                <div id="simg"class="thumbnail" style="margin-top:10px;height:230px;background-color: rgba(230,238,255,0.5);  width:250px;border: 1px solid #218dfb;">
                                                     <img id="shopImage" src="img/selectv.png" alt="">
						</div>
                                            </div>
                                            <div class="col-md-3">
                                                <h1 id="head" style="font-family: 'Dosis', sans-serif;">Shop Name</h1>
                                                <p id="address" style="font-family: 'Dosis', sans-serif;">Address</p>
                                                <h3 id="contact" style="font-family: 'Dosis', sans-serif;">Contact</h3>
                                                
                                                <div id="rating" class="ratings" style="">
                                
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
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="bxslider">
                                                    <li><img src="http://placehold.it/800x400" /></li>
                                                    <li><img src="http://placehold.it/800x400" /></li>
                                                    <li><img src="http://placehold.it/800x400" /></li>
                                                    <li><img src="http://placehold.it/800x400" /></li>
                                                </ul>
                                            </div>
                                        </div>   
                                    </div>    
                               </div>
                            </div>
                                
                <!--
                <div class="col-md-4">
                    
                    
                    
							<div id="simg"class="thumbnail dsplay" style="margin-top:10px;height:250px;background-color: rgba(230,238,255,0.5);  width:250px;border: 1px solid #218dfb;">
                            <img id="shopImage" src="img/selectv.png" alt="">
							</div>
							<div id="rating" class="ratings dsplay" style="">
                                
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
                    <div id="type" class="list-group" style="padding-top:20px;">
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5); cursor:pointer; margin-bottom:10px;" value="ring">Rings</a>
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5);cursor:pointer; margin-bottom:10px;" value="earings">Earings</a>
								<a class="list-group-item" style="background-color: rgba(230,238,255,0.5);cursor:pointer; margin-bottom:10px;" value="neckles">Neckles</a>
							</div>
		</div>
                -->
					<div class="col-md-12">
						
						<div id="productlist">
                                                    <?php
                                                        listall();
                                                    ?>
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
		
		
                  <script src="js/jquery.bxslider.min.js"></script>
                  <script src="js/productfilter.js"></script>
		<script type="text/javascript">
		function btnfunc(){
			comparenow.disabled=true; 
			$( "input[type='checkbox']" ).prop({disabled:false});
			$( "input[type='checkbox']" ).prop({checked:false});
			$('#myModal').modal('hide');
		}
			
		</script>
    
	</body>
</html>