<?php

    require_once 'init.php';
    
	echo '
		<div class="row" style="background-image:url(img/dia.png); background-size: 100% 100%;">
	    	<div class="col-xs-12">
	    		<div class="logo-wrap text-center">
    				<img src="img/logo2.png" class="img-responsive center-block" style="visibility:visible;animation-name:bounceIn;animation-duration: 4s;" alt="logo" >		
    			</div>
	    	</div>
			</div>
	
	
			<div class="row ">
				

				<nav class="navbar navbar-default " role="navigation">
        			<div class="container-fluid">
           			 <!-- Brand and toggle get grouped for better mobile display -->
            		<div class="navbar-header">
               			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    		<span class="sr-only">Toggle navigation</span>
                    		<span class="icon-bar"></span>
                    		<span class="icon-bar"></span>
                    		<span class="icon-bar"></span>
                		</button>
             
            		</div>
            		<!-- Collect the nav links, forms, and other content for toggling -->
            		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="">
              		
              			<ul class="nav navbar-nav">
				<li>
                        		<a value="index.php" class="'.$_SESSION['N1'].'" style="font-size:20px; cursor:pointer;">Home</a>
                    		</li>
                    		<li>
                        		<a value="showcase.php" class="'.$_SESSION['N2'].'" style="font-size:20px; cursor:pointer;">Showcase</a>
                    		</li>
                    		<li>
                       			<a value="design.php" class="'.$_SESSION['N3'].'" style="font-size:20px; cursor:pointer;">Design</a>
                    		</li>
                    		<li>
                        		<a value="vr1.php" class="'.$_SESSION['N4'].'" style="font-size:20px; cursor:pointer;">Vmirror</a>
                    		</li>
					 		<li>
                        		<a value="photohub.php" class="'.$_SESSION['N5'].'" style="font-size:20px; cursor:pointer;">Photohub</a>
                    		</li>
               			</ul>
						
            		</div>
            <!-- /.navbar-collapse -->
		        	</div>
        <!-- /.container -->
    			</nav>
			</div>
	';
?>