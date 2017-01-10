<?php
//session_start();
 //require_once 'core.inc.php';
 //$_SESSION['receiver1']="ranil";
require_once 'init.php';
 //$_SESSION['username']="Tharindu";
 //$_SESSION['email']="tharindu.ishanka1994@gmail.com";
 //echo $name1;
 $sess = "select * from customerlogin where email = '{$_SESSION['email']}'";
 $sess_run = mysqli_query($link,$sess);
 $sess_row = mysqli_fetch_assoc($sess_run);
 $sess_id = $sess_row['id'];

 //$_SESSION['email'] = $sess_row['email'];
 //$_SESSION['username'] = $sess_row['username'];
?>

<html>
	
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	
	<link href="css/home.css" rel="stylesheet">
	<link href="css/profile.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--<script type="text/javascript">
    	function AutoRefresh(t){
    		setTimeout("location.reload(true);",t)
    	}
    </script>>-->

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    
    

    <script>
    	$(document).ready(function(){
    		$('[name="view_not"]').click(function(event){
    			$.post("notification.php",{no_id: event.target.id},function(data){
    				$('[name="'+event.target.id+'"]').html(data);
    			});
    		});
    	});

    	$(document).ready(function(){
    		$("#profile").click(function(){
    			alert("profile picture successfully updated!");
    		});
    	});

    	

    	
    	
    	

    	$(document).ready(function(){
    		$("#saved").click(function(){
    			var data = $("#myForm :input").serializeArray();

    			$.post($("#myForm").attr("action"), data, function(info){
                        if(info==="enter your current password" || info==="password incorrect!")    
                            $('#response').html(info);
    			else
                            $('#la2').html(info);
    				
    					
    				});
    		});

    		$("#myForm").submit(function(){
    			return false;
    		});
    	});


    </script>>
    



</head>

<body style="background-size: 100% 100%; background-color: #E1E1E1">

    <?php 
			if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
			else{$_SESSION['er1']="false";}?>
			<?php include ("template/menu.php"); ?>
		
	   
			<?php include 'template/headnav.php';?>

    <!-- Page Content -->
    <div class="container-fluid" style="margin-top:50px;">
		<div class="row">
			<div class="col-sm-3 sidenav" style="height:550px;">
				
				<div class="row" style="background-color:grey">
				<div class="span12" style="text-align: center">  
					<!--<img class="thumbnail text-center" style="height:150px; width:150px; margin: 20px 90px 20px 90px;" src="img/users/user.png" alt="Profile image example"/>-->
					<div id="preview">
						<!--<?php 
							/*$path="";
							$query_image = "SELECT `pro_pic` FROM `customerlogin` WHERE username='{$_SESSION['username']}'";
							if ($query_image_run = mysqli_query($link,$query_image)) {
								$row = mysqli_fetch_assoc($query_image_run);
								$path = $row['pro_pic'];*/
							//}

						?>
						<img id="propic1" class="thumbnail text-center" style="height:150px; width:150px;margin: 20px 90px 20px 90px;" 
						src="<?php //echo $path;?>">-->
						<!--<img src="img/no-image.jpg" style="height:200px;" />-->

						<?php
							$i_path="";
							$query_image = "select pro_pic from customerlogin where email = '{$_SESSION['email']}'";
							if($image_run = mysqli_query($link,$query_image)){
								$row_image = mysqli_fetch_assoc($image_run);
								$i_path = $row_image['pro_pic'];
							}
							?>
						
						<img src="<?php echo $i_path;?>" style="height:200px;"  />

				</div>
					<br>
				</div>
				</div>
				<div class="row">
					<h1 class="text-center">Info</h1>
					<p class="text-center"><!--Tharindu Ishanka<br>tharindu.ishanka1994@gmail.com<br>077-1947574-->
						<?php
							/*$details = "SELECT `username`,`email` FROM `customerlogin` WHERE `username`='{$_SESSION['username']}' ";
							if ($details_run = mysqli_query($link,$details)) {
								while ($row = mysqli_fetch_assoc($details_run)) {
									echo $row['username'];
									echo "<br>";
									echo $row['email'];
									
								}
							}
							*/

						?>
						<label id="la2"><?php $info = "SELECT `username`,`email` FROM `customerlogin` WHERE `id` = '$sess_id'";
							$det = mysqli_query($link,$info);
							$row_name = mysqli_fetch_assoc($det);
    						echo $row_name['username'];
    						echo "<br/>";
    						echo $row_name['email'];  ?></label><br>
						<!--<label id="la2"><?php /*$info2 = "SELECT `username`,`email` FROM `customerlogin` WHERE `username`='{$_SESSION['username']}' ";
							$det2 = mysqli_query($link,$info2);
							$row_name2 = mysqli_fetch_assoc($det2);
    						echo $row_name['email'];*/?></label>-->
    						
					</p>
				</div>
			  <!---  <div class="fb-profile" >
			   
					<img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>
					
				</div>
				<div class="fb-profile-text">
				<br>
				<h1>Info<h1>
					 </div>-->
					 
			
			</div>
				
			
			
			<div class="col-sm-9 sidenav" style="height:550px;">
				<br>
				<div class="row">
					<ul class="nav nav-tabs" style="margin-left: 50px;">
					  <li><a href="#menu1">Images</a></li>
					  <li><a href="#menu2">Notifications <span class="badge"><?php $num_not = mysqli_query($link,"SELECT * FROM `notification` WHERE `customer`= '{$_SESSION['username']}' AND `view`= 'no'");
					  echo mysqli_num_rows($num_not); 

					  ?></span></a></li>
					  
					  <li class="active"><a href="#menu3">Messages <span class="badge">3</span></a></li>
					  <li><a href="#menu4">Settings</a></li>
					</ul>
				</div>
				<br><br>
				<div class="tab-content">
					<div id="menu3" class="tab-pane fade in active">
						<div class="col-md-8">
							
							<div class="panel panel-info">
								<div class="panel-heading">
								
									RECENT CHAT 
								</div>
								<div class="panel-body"  style="height: 280px; overflow-y: scroll;">
													<ul class="media-list" id="messages">
																											  
													</ul>
								</div>
								<div class="panel-footer">
									<form action="#" method="get" id="form_input">
										<div class="input-group">
											<input type="text" class="form-control" name="message" id="message" placeholder="Enter Message" />
											<span class="input-group-btn">
											<button class="btn btn-info" id="send" name="send" type="submit">SEND</button>
											</span>
														
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							
							  <div class="panel panel-primary">
								<div class="panel-heading">
								   VENDORS
								</div>
								<div class="panel-body" style="height: 280px; overflow-y: scroll;">
													<ul class="media-list">

														<li class="media">
														
															<div class="media-body">

																<div class="media" >
																<div class="vendor">
																	<a class="pull-left" value="mallika" >
																		<img class="media-object img-circle" style="max-height:40px;" src="img/users/user0.png" />
																	</a>
																	<div class="media-body" >
																		<h5>mallika | vendor </h5>
																		
																	   <small class="text-muted">Active From 3 hours</small>
																	</div>
																</div>
																</div>
															</div>
														
														</li>
														
													</ul>
									</div>
								</div>
							
						</div>
					</div>
					
					<div id="menu2" class="tab-pane fade">
						<h3>Your Notifications.....</h3>
						<hr />
						<?php 
							$query = mysqli_query($link,"SELECT * FROM `notification` WHERE `customer` = '{$_SESSION['username']}' AND `view` = 'no'");
							if (mysqli_num_rows($query) == NULL) {
									echo "no new notifications";
									//exit();
							}
						while ($fetch = mysqli_fetch_assoc($query)) {
							$id = $fetch['not_id'];
							$vendor = $fetch['vendor'];
							$price = $fetch['price'];

						?>
						<div class="text-center" style="width:90%; height:75px;background:grey;color:white;padding:20px;margin-bottom:10px;">
							<div class="pull-left">
								<?php echo $vendor;?> has sent you a quoatation
								<label style="margin-left:-10%; position:absolute; margin-top:15px;" name="<?php echo $id;?>"></label>
							</div>
							

							<button class="btn btn-info pull-right" style="margin-right:10px;" data-toggle="modal" data-target="#myModal5" type="submit" name="view_not" id="<?php echo $id;?>">view</button>
							<!--<label style="margin-left:-26%; position:absolute; margin-top:20px;" name="<?php echo $id;?>"></label>-->
							<!-- modal-->
							<label><?php echo "$price";?></label>
							<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          									<h4 class="modal-title" id="myModalLabel5" style="color:black;">Quoatation</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-3">
													<a href="#" class="thumbnail">
														<img src="img/ring1.png" style="height:100px;"/>
													</a>
												</div>
												<div class="col-md-9" style="color:black;">
													Quotation for your preferred jewellery
													
													<br/>
													<table class="table table-hover">
													    <thead>
													      <tr>
													        <th>Jewellery type</th>
													        <th>Size</th>
													        <th>Metal</th>
													        <th>Diamond</th>
													      </tr>
													    </thead>
													    <tbody>
													      <tr>
													        <td>Ring</td>
													        <td>45</td>
													        <td>Gold</td>
													        <td>Rose</td>
													      </tr>
													      
													    </tbody>
													 </table>
													 <br>
													 Estimated Price(Rs.) :<?php echo "$price";?>


												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>


						</div>

						<?php 
							}
						?>

						<?php 
							$query2 = "SELECT * FROM `notification` WHERE `customer` = '{$_SESSION['username']}' AND `view` = 'yes'";
							$query2_run = mysqli_query($link,$query2);
							while ($rows2 = mysqli_fetch_assoc($query2_run)) {
								$vendor2 = $rows2['vendor'];
								$id2 = $rows2['not_id'];
								?>
								<div class="text-center" style="width:90%; height:75px;background:blue;color:white;padding:20px;margin-bottom:10px;"> 
									<div class="pull-left">
										<?php echo $vendor2;?> has sent you a quoatation
										<label style="margin-left:-10%; position:absolute; margin-top:15px;">viewed</label>
									</div>

									<button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal6">
									view</button>

									<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
													<h4 class="modaal-title" id="myModalLabel">title</h4>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-3">
															<a href="#" class="thumbnail">
																<img src="img/ring2.png" style="height:100px;"/>
															</a>
														</div>
														<div class="col-md-9">
															<p style="color:black;">We are pleasure to receive your jewellery design.Thank You..!</p>
															<a href="download.php?id=<?php echo $id2 ?>" >download pdf</a>
														</div>
													</div>



												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
												</div>
											</div>
										</div>
									</div>



								</div>

								<?php
								}
								?>







						
					</div>
					
					<div id="menu1" class="tab-pane fade">
						
						<p>Jewelleries designed by yourself:</p>

						<!--add image gallery for customer designs -->

						<div class="row">
						  <div class="col-md-3">
						    <a href="img/designed-items/bangle.png" class="thumbnail">
						      <p>Type:Bangle<br>Metal:Gold<br>Size:5</p>
						      <img src="img/user_designs/img1.jpg" alt="Pulpit Rock">
						    </a>
						  </div>
						  <div class="col-md-3">
						    <a href="chain.png" class="thumbnail">
						      <p>Type:Chain<br>Metal:Gold<br>Size:5</p>
						      <img src="img/user_designs/img2.jpg" alt="Moustiers Sainte Marie">
						    </a>
						  </div>
						  <div class="col-md-3">
						    <a href="bracelet.png" class="thumbnail">
						      <p>Type:Bracelet<br>Metal:Gold<br>Size:5</p>
						      <img src="img/user_designs/img1.jpg" alt="Cinque Terre">
						    </a>
						  </div>
						</div>
					</div>
					
					<div id="menu4" class="tab-pane fade">
						
							<form id="myForm" action="prof_mod.php"  method="post">

								
								<div class="form-group has-feedback">
								    <label class="control-label">Username</label>
								    <input type="text" class="form-control" placeholder="Enter new username" name="uname" id="uname" 
								    value="<?php $qrun = mysqli_query($link,"select username from customerlogin where email='{$_SESSION['email']}'");
								   			$row = mysqli_fetch_assoc($qrun);
								   			echo $row['username'];?>" style="width:70%;"/>
								   			
								    <i class="glyphicon glyphicon-user form-control-feedback" ></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">Email:</label>
								    <input type="email" class="form-control" placeholder="Enter new email" name="cemail" id="cemail" 
								    value="<?php $qrun2 = mysqli_query($link,"select email from customerlogin where email='{$_SESSION['email']}'");
								    		$row2 = mysqli_fetch_assoc($qrun2);
								    		echo $row2['email'];?>" style="width:70%;"/>
								    <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">Current Password:</label>
								    <input type="password" class="form-control" placeholder="Enter current password" name="cpwd" id="cpwd" value="" style="width:70%;" />
								    <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">New Password:</label>
								    <input type="password" class="form-control" placeholder="Enter new password" name="npwd" id="npwd" style="width:70%;" />
								    <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
								</div>
								
							  
							    
				    			<button type="submit" class="btn btn-info" id="saved">Save Changes</button>
				    			<span id="response" style="color:red;"></span>
				  			</form>
										
						<label>Change Profile Picture</label>
						<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
							<input id="uploadImage" type="file" accept="image/*" name="image" />
							<input id="button" type="submit" value="Upload" class="btn btn-info">
						</form>
					    <div id="err"></div>






						<!--<div style="display:block; visibility:hidden;">
						<iframe id="iframe" display="none" style="" name="iframe"></iframe></div>
						<form action="profile-controll.php" method="post" enctype="multipart/form-data" target="iframe" style="position:absolute; margin-top:-150px;">
							<p>Change profile picture:</p>
							<input type="file" name="fileToUpload" id="fileToUpload" value="select image">
							<input type="submit" value="upload image" name="submit" class="btn btn-info btn-sm" id="profile">
						</form>-->
					</div>
					
					
				</div>
								
								<hr>
			</div>
						
		</div>
    </div>  

        <!-- Footer -->
    <footer class="container1" style="">
		<?php include 'template/footer.php';?>	
	</footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/chat.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
	});
	</script>

</body>

</html>