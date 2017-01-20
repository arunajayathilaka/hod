<?php
//session_start();
 //require_once 'core.inc.php';
 //$_SESSION['receiver1']="ranil";
require_once 'init.php';
  //$_SESSION['username']="Tharindu";
  //$_SESSION['emailn']="t.ishanka1994@gmail.com";
 //echo $name1;
 $_SESSION['N2']=$_SESSION['N1']=$_SESSION['N3']=$_SESSION['N4']=$_SESSION['N5']="";
   // $_SESSION['N3']="activenav";
 if(!isset($_SESSION['username'])){
        header("Location: index.php");
 }
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
	<link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">	
    

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
    <script type="text/javascript" src="js/image_script.js"></script>
    <script type="text/javascript" src=""></script>
    <style >
        .colorchat{
            background-color:#bce8f1;;
        }
    </style>
    

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
                        if(info==="Enter your current Password and E-mail" || info==="Password incorrect!")    
                            $('#response').html(info);
    			else
                            $('#la2').html(info);
    				
    					
    				});
    		});

    		$("#myForm").submit(function(){
    			return false;
    		});
    	});


    </script>
    



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
							$query_image = "select pro_pic from customerlogin where email = '{$_SESSION['emailn']}'";
							if($image_run = mysqli_query($link,$query_image)){
								$row_image = mysqli_fetch_assoc($image_run);
								$i_path = $row_image['pro_pic'];
							}
							?>
						
						<img src="<?php echo $i_path;?>" style="height:200px; width:200px;" id="preview" />

				</div>
					<br>
				</div>
				</div>
				<div class="row">
					<h1 class="text-center">Info</h1>
					<p class="text-center"><!--Tharindu Ishanka<br>tharindu.ishanka1994@gmail.com<br>077-1947574-->
						
						<label id="la2"><?php 
    						echo $_SESSION['username'];
    						echo "<br/>";
    						echo $_SESSION['emailn'];  ?>
                                                </label><br>
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
				<?php
					$sqlunread = "SELECT * FROM chat WHERE receiver = '{$_SESSION['username']}'  AND view = 'no' ";
                    $resunread = mysqli_query($link, $sqlunread);
                    $countunread = mysqli_num_rows($resunread);

				?>
				<div class="row">
					<ul class="nav nav-tabs" style="margin-left: 50px;">
					  <li><a href="#menu1">Images</a></li>
					  <li><a href="#menu2">Notifications <span class="badge"><?php $num_not = mysqli_query($link,"SELECT * FROM `notification` WHERE `customer`= '{$_SESSION['username']}' AND `view`= 'no'");
					  echo mysqli_num_rows($num_not); 

					  ?></span></a></li>
					  
					  <li class="active"><a href="#menu3">Messages <span class="badge"><?php echo $countunread;?></span></a></li>
					  <li><a href="#menu4">Settings</a></li>
					</ul>
				</div>
				<br><br>
				<?php
                    $loadcustomersql = "SELECT * FROM vendor";
                    $rescustomer = mysqli_query($link,$loadcustomersql);
                    $rowcustomer = null;
                    while ($rowcustomer = mysqli_fetch_array($rescustomer)) {
                        $logincustomer[] = $rowcustomer;
                    }
                ?>    
				<div class="tab-content">
					<div id="menu3" class="tab-pane fade in active">
						<div class="tab-pane" id="chat">
                            <div class="row">
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
                                            
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="messager" id="messageinput" placeholder="Enter Message" />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" id="send" name="send" onclick="send1();" value="">SEND</button>
                                                    </span>

                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Vendors
                                        </div>
                                        <div class="panel-body" style="height: 280px; overflow-y: scroll;">
                                            <ul class="media-list" >

                                                <li class="media">

                                                    <div class="media-body">

                                                        <div class="media" id='mediabody' >
                                                            <?php foreach ($logincustomer as $customer):?>
                                                            <div class="vendor" onclick="select('<?php echo $customer['vendor_username'];?>');" style=" margin-top:5px;" id="<?php echo $customer['vendor_username'];?>">
                                                                
                                                               
                                                                 <?php 
                                                                        $sqlunread = "SELECT * FROM chat WHERE receiver = '{$_SESSION['username']}' AND sender='{$customer['vendor_username']}' AND view = 'no' ";
                                                                        $resunread = mysqli_query($link, $sqlunread);
                                                                        $countunread = mysqli_num_rows($resunread);
                                                                 ?>
                                                                <div class="media-body" >
                                                                    <div class="row" style="margin-top:16px;">
									<div class="col-xs-2">
										<a class="pull-left">
                                                                            		<img class="media-object img-circle" style="height:40px;width:50px;" src="<?php echo $customer['image_url']?>" />
                                                                        	</a>

									</div>
                                                                                                                                                
                                                                        <div class="col-xs-4">
                                                                            <h5><?php echo $customer['vendor_name'];?></h5>
                                                                            
                                                                        </div>
                                                                        <div class="col-xs-2">
                                                                            <?php if($countunread>0):?>
                                                                            <span class="badge" style=" margin-top: 10px;"><?php echo  $countunread;?></span>
                                                                            <?php endif;?>
                                                                        </div>
                                                                        <div class="col-xs-4">
                                                                             <?php if($countunread>0):?>
                                                                                <img class="img-responsive" src='img/chat.png' style="height: 20px; width:20px; margin-top: 10px;"/>
                                                                             <?php endif;?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                   
                                                                   
                                                                </div>
                                                                </br>
                                                                
                                                            </div>
                                                            
                                                            <?php endforeach;?>
                                                        </div>
                                                    </div>

                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
		
	</div><!--/.main-->
					
					
					<div id="menu2" class="tab-pane fade">
						<h3>Your Notifications.....</h3>
						<hr />
						<?php 
							$query = mysqli_query($link,"SELECT * FROM `notification` WHERE `customer` = '{$_SESSION['username']}' AND `view` = 'no'");
							if (mysqli_num_rows($query) == NULL) {
									echo "No new notifications";
									echo "<br><br>";
									//exit();
							}
							$i = 1;
						while ($fetch = mysqli_fetch_assoc($query)) {
							$id = $fetch['not_id'];
							$vendor = $fetch['vendor'];
							$price = $fetch['price'];
							$type = $fetch['jewel_type'];
							$size = $fetch['size'];
							$metal = $fetch['metal'];
							$diamond = $fetch['diamond'];
							$jewel_image = $fetch['jewel_image'];
                                                        $des = $fetch['description'];

							echo '
								<div class="col-sm-9">
								<div class="row" style="background-color:#696969;height:50px;">
									<div class="col-sm-6" style="height:20px;padding-top:10px;">'.$vendor.' has sent you a quotation
									<label name="'.$id.'"></label>
									</div>
                                                                        <div style="padding-top:10px; padding-right:5px;">
									<button class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#myModal5'.$i.'" type="submit" name="view_not" id="'.$id.'">view</button>
                                                                         </div>
									<div class="modal fade" id="myModal5'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          									<h4 class="modal-title" id="myModalLabel5" style="color:black;">Quotation</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-3">
													<a href="#" class="thumbnail">
														<img src="'.$jewel_image.'" style="height:100px;"/>
													</a>
												</div>
												<div class="col-md-9" style="color:black;">
													Quotation for your prefered jewellery
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
													        <td>'.$type.'</td>
													        <td>'.$size.'</td>
													        <td>'.$metal.'</td>
													        <td>'.$diamond.'</td>
													      </tr>
													      
													    </tbody>
													 </table>
													 <br>
                                                                                                         <p>'.$des.'</p>
													 Estimated Price(Rs.) :'.$price.'
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>



								</div></div><br><br><br>











								';























							$i++;
						 
							}
						?>

						<?php 
							$query2 = "SELECT * FROM `notification` WHERE `customer` = '{$_SESSION['username']}' AND `view` = 'yes'";
							$query2_run = mysqli_query($link,$query2);
							$j = 1;
							while ($rows2 = mysqli_fetch_assoc($query2_run)) {
								$vendor2 = $rows2['vendor'];
								$id2 = $rows2['not_id'];
								$price2 = $rows2['price'];
								$type2 = $rows2['jewel_type'];
								$size2 = $rows2['size'];
								$metal2 = $rows2['metal'];
								$diamond2 = $rows2['diamond'];
								$jewel_image2 = $rows2['jewel_image'];
                                                                $des = $rows2['description'];



								echo '
								<div class="col-sm-9">
								<div class="row" style="background-color:grey;height:50px;">
									<div class="col-sm-6" style="height:20px; padding-top:5px;">'.$vendor2.' has sent you a quotation
									<label>(viewed)</label>
									</div>
                                                                        <div style="padding-top:10px;padding-right:5px;">
									<button class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#myModal6'.$j.'" type="submit" name="view_not2" id="'.$id2.'">view</button>
                                                                        </div>
									<div class="modal fade" id="myModal6'.$j.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel6" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          									<h4 class="modal-title" id="myModalLabel6" style="color:black;">Quotation</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-3">
													<a href="#" class="thumbnail">
														<img src="'.$jewel_image2.'" style="height:100px;"/>
													</a>
												</div>
												<div class="col-md-9" style="color:black;">
													Quotation for your prefered jewellery
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
													        <td>'.$type2.'</td>
													        <td>'.$size2.'</td>
													        <td>'.$metal2.'</td>
													        <td>'.$diamond2.'</td>
													      </tr>
													      
													    </tbody>
													 </table>
													 <br>
                                                                                                         <p>'.$des.'</p>
													 Estimated Price(Rs.) :'.$price2.'
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>



								</div></div><br><br><br>

	






								';











								$j++;

								}
								?>







						
					</div>
					
					<div id="menu1" class="tab-pane fade">
						<h3>You can upload your jewelry images to the photohub.....</h3>
						<form id="form2" action="image_upload.php" method="post" enctype="multipart/form-data">
							<input type="text" name="img_desc" class="form-control" placeholder="Enter jewelry description here!">
							<input id="uploadImage2" type="file" accept="image/*" name="image2" class="form-control" />
							<input id="button" type="submit" value="Upload" class="btn btn-info btn-sm">
						</form>
					    <div id="err"></div>
					    <div  class="row" style="overflow-y:scroll;height:300px;">
						<div class="col-xs-12"id="gallery" >
					    	<?php 
					    		$query_gal = "select * from articles where username = '{$_SESSION['username']}'";
					    		$query_gal_run = mysqli_query($link,$query_gal);

					    		while ($gal = mysqli_fetch_assoc($query_gal_run)) {
					    			$image_title = $gal['title_name'];
					    			$gal_image = $gal['image_url'];
					    			$gal_id = $gal['id'];

					    			echo '<div class="col-md-2" style="height:200px; width:150px;">
										    <div class="thumbnail" style="height:180px;width:150px;">
										    
										        <img src="'.$gal_image.'" alt="Lights" style="width:100%;height:100px;">
										        <div class="caption">
										          <p>'.$image_title.'</p>
										        </div>
										        <a  id="'.$gal_id.'"><span class="glyphicon glyphicon-trash"></span></a>
										      
										    </div>
										  </div>';
					    		}

					    	?>

					    	</div>
					    	
					    	<script>
					    		$("#gallery .thumbnail a").click(function(){
								var element = $(this);
								var del_id = element.attr("id");
								var info = 'id=' + del_id;
								//alert("gfdh");
								if(confirm("Are you sure you want to delete this?"))
								{
								$.ajax({
								type: "POST",
								url: "delete.php",
								data: info,
								success: function(){
								}
								});
								$(this).parents(".col-md-2").animate({ backgroundColor: "#003" }, "slow")
								.animate({ opacity: "hide" }, "slow");
								}
								return false;
							});

					    	</script>
					    		






					

					    </div>
						
					</div>
					
					<div id="menu4" class="tab-pane fade">
						<div class="col-sm-7">
							<form id="myForm" action="prof_mod.php"  method="post">

								
								<div class="form-group has-feedback">
								    <label class="control-label">Username</label>
								    <input type="text" class="form-control" placeholder="Enter new username" name="uname" id="uname" 
								    value="<?php $qrun = mysqli_query($link,"select username from customerlogin where email='{$_SESSION['emailn']}'");
								   			$row = mysqli_fetch_assoc($qrun);
								   			echo $row['username'];?>" style="width:100%;"/>
								   			
								    <i class="glyphicon glyphicon-user form-control-feedback" ></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">Email:</label>
								    <input type="email" class="form-control" placeholder="Enter new email" name="cemail" id="cemail" 
								    value="<?php $qrun2 = mysqli_query($link,"select email from customerlogin where email='{$_SESSION['emailn']}'");
								    		$row2 = mysqli_fetch_assoc($qrun2);
                                                                                echo $row2['email'];?>" style="width:100%;" required=""/>
								    <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">Current Password:</label>
								    <input type="password" class="form-control" placeholder="Enter current password" name="cpwd" id="cpwd" value="" style="width:100%;" required=""/>
								    <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
								</div>

								<div class="form-group has-feedback">
								    <label class="control-label">New Password:</label>
								    <input type="password" class="form-control" placeholder="Enter new password" name="npwd" id="npwd" style="width:100%;" />
								    <i class="glyphicon glyphicon-pencil form-control-feedback"></i>
								</div>
								
							  
							    
				    			<button type="submit" class="btn btn-info btn-sm" id="saved">Save Changes</button>
				    			<span id="response" style="color:red;"></span>
				  			</form>
				  		
										
						<label>Change Profile Picture</label>
						<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
							<input id="uploadImage" type="file" accept="image/*" name="image" class="form-control" />
							<input id="button" type="submit" value="Upload" class="btn btn-info btn-sm">
						</form>
					    <div id="err"></div>
					    </div>






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
    <script src="js/routes.js"></script>
	<script>
	$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
	});
	</script>

	<script >
            function select(inputcus){
                var selected = "#"+inputcus; 
                $( document ).ajaxSuccess(function() {
                    $('#mediabody .vendor ').removeClass("colorchat");
                    $(selected).addClass("colorchat");
                 });
                $.ajax({
                    url:'chatdetails.php',
                    method:'POST',
                    data:{inputcus:inputcus},
                    success:function(data){
                        var ty="#"+inputcus;
                         $('#messages').html(data);
                         $('#send').val(inputcus);
                         $("#mediabody").load('profile4.php #mediabody');
                    }
                });
            }
            
            function send1(){
                var to = $('#send').val();
                var mes = $('#messageinput').val();
                if(to!==""){
                    if(mes!==""){
                        $.ajax({
                            url:'chatdetails.php',
                            method:'POST',
                            data:{to:to,mes:mes},
                            success:function(data){
                                select(to);
                                $('#messageinput').val("");
                            }
                        });
                    }else{
                        alert("Please type the message");
                    }
                }else{
                    alert("Please select a customer");
                }
            
            }

            
           
        </script>

</body>

</html>
