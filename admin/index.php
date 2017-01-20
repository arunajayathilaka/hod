<?php
    	
        require_once 'fetch.php';
        
        //require_once 'search.php'
        
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<a class="navbar-brand" href="#"><img src="img/logo2.png" style="height:60px;width:200px"></a>
			<div class="navbar-header" style="height:25px;">
				<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				
				<!--<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>-->
			</div>
							
		<!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<!--<li><a href="#vendor"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Add Vendor</a></li>
			
			<li><a href="#ajewellary"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Add Jewellary</a></li>
			<!--<li><a href="panels.html"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg> Add new Admin</a></li>-->
			<!--<li><a href="#editv"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg> Edit vendor</a></li>
            <li><a href="#edjewellary"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Edit Jewellary</a></li>-->
            
            
            
            <li class="parent">
				<a href="#vendor">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg></span> Vendor 
				</a>
			</li>
            
            
            <li>
				<a href="#jewellary">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Jewellary 
				</a>
			</li>
            <li><a href="#admin"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>Admin</a></li>
            <li><a href="#backup"><svg class="glyph stroked download"><use xlink:href="#stroked-download"></use></svg> Backup</a></li>
            <li><a href="#report"><svg class="glyph stroked notepad"><use xlink:href="#stroked-notepad"></use></svg>Report</a></li>
            
			
			<li role="presentation" class="divider"></li>
			<!--<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>-->
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Diamantes Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
                                <?php 
                                            require_once 'database.php';
                                            $likes='';
                                            $select = mysqli_query($conn,"SELECT COUNT('vendor_username') AS quotations FROM quotation");
                                            
                                            while($row=mysqli_fetch_array($select)){
                                                $rowq=$row;
                                            }
                                            
                                           echo $rowq['quotations'];
                                ?></div>
							<div class="text-muted">Sent Quotations</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php 
                                            require_once 'database.php';
                                            
                                            $select = mysqli_query($conn,"SELECT COUNT('id') AS likes FROM articles_likes");
                                            while($row=mysqli_fetch_array($select)){
                                                $rown=$row;
                                            }
                                            
                                            echo $rown['likes'];  
                                ?></div>
							<div class="text-muted"> Likes</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php 
                                            require_once 'database.php';
                                            
                                            $select = mysqli_query($conn,"SELECT COUNT('id') AS customers FROM customerlogin");
                                            while($row=mysqli_fetch_array($select)){
                                                $cusm=$row;
                                            }
                                            
                                            echo $cusm['customers'];
                                ?></div>
							<div class="text-muted">Registered Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked heart"><use xlink:href="#stroked-heart"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php 
                                            require_once 'database.php';
                                           
                                            $select = mysqli_query($conn,"SELECT COUNT('id') AS love FROM articles_love");
                                            while($row=mysqli_fetch_array($select)){
                                                $luv=$row;
                                                }
                                            echo $luv['love']; ?></div>
							<div class="text-muted"> Love</div>
						</div>
					</div>
				</div>
        </div>
		</div><!--/.row-->
        <div class="row">
                <div class="row">
                   <div class="panel panel-default">
                       <div class="row">
                        <div class="row">
                        <div class="panel-heading">
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-5">
                               </div>
                        <div class="col-lg-8 col-md-8 col-xs-7">Vendor pending requests</div> </div></div>
					<div class="panel-body">
                        <div id="tempvendor"><a name="vendor"></a>
                             <?php require_once('init.php'); 
                                $query="select * from temp_vendor";
                                $vendor1 = mysqli_query($conn,"$query");
                        $v= 1;
                        while($usern = mysqli_fetch_assoc($vendor1)){
				        
                    
                       echo '<div class="Allvendor" id='.$usern['vendor_username'].'>
						<div class="col-sm-6 col-lg-3 col-md-4" style="margin-right:-17px">
							<div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb;">
								
								<div class="caption">
                                    <div class="row">
                                    <center><h4 style="color:darkblue;">'.$usern['vendor_name'].'</h4></center>
                                    </div>
									<p>Email:'.$usern['vendor_email'].'</p>
                                    <h4>Telephone:'.$usern['telephone'].'</h4><br><br><br>
                                    <div class="row">
                                    <div class="col-lg-8">
                                            <input class="chk1 sr-only" type="checkbox" checked name="item_id[]" value="'.$usern["vendor_username"].'" />
                                        </div>
                                    <div class="col-lg-4">
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-plus"data-toggle="modal" data-target="#addv'.$v.'" style="height:45px; width:45px;"></button>
        <!--Add vendor modal-->
        <div class="row">
            
			<div class="modal fade" role="dialog" data-toggle="modal" id="addv'.$v.'" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Add Vendor</div>
                    </div>
                    <div class="modal-body">
					   <form role="form" method="post" action="addvendor.php" enctype="multipart/form-data">
                           
								<div class="form-group">
									<label>Vendor name:</label>
									<input class="form-control" placeholder="Vendor name" name="vname" value="'.$usern['vendor_name'].'"required="required">
								</div>
                                
                                <div class="form-group" style="width:300px;">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="vmail" type="email" value="'.$usern['vendor_email'].'">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Telephone</label>
									<input class="form-control" placeholder="Telephone" name="vtel" required="required" type="number" value="'.$usern['telephone'].'">
								</div>
                                <div class="form-group">
									<label>Address</label>
									<input class="form-control" placeholder="Address" name="vadd" required="required" value="'.$usern['vAddress'].'">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Username</label>
									<input class="form-control" placeholder="Username" name="uname" required="required" value="'.$usern['vendor_username'].'">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Password</label>
									<input type="password" class="form-control" name="vpass" required="required" value="'.$usern['vendor_password'].'">
								</div>
                                <div class="form-group">
									<label>Vendor logo</label>
									<input type="file" name="image_url" id="image_url">
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary" id="add">Add</button>
                                </center>
                                <br>
									
									
                        </form>
                    </div>
					</div>
				</div>
            </div>
            
            </div>
                                    </div>
                                    </div>
								</div>
                                
							</div>
                            </div>
                          
						</div>';
                            $v++;
                           
            } 
                  
                  ?>
                
                        </div></div>
                       
                       
                       
                       
                       
                       
                       </div>
					<div class="panel-heading">
                <div class="col-lg-3 col-sm-4 col-md-4 col-xs-5">
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-plus"data-toggle="modal" data-target="#addv" style="height:45px; width:45px;"></button>
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-trash "  name="del" id="del" style="height:45px; width:45px;"></button>
                               </div>
                        <div class="col-lg-8 col-md-8 col-xs-7">Vendor Details</div> </div>
					<div class="panel-body">
              <div id="productlists">
                  
                        <?php require_once('init.php'); 
                                $query="select * from vendor";
                                $users2 = mysqli_query($conn,"$query");
                                
                  
				       $i = 1;
                        while($user = mysqli_fetch_assoc($users2)){
				        
                    
                       echo '<div class="Allvendor" id='.$user['vendor_username'].'>
						<div class="col-sm-6 col-lg-3 col-md-4" style="margin-right:-25px">
							<div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb;">
								<img src="../'.$user['image_url'].' ?>" style="height:30%;" alt="">
								<div class="caption">
                                    <div class="row">
                                    <center><h4 style="color:darkblue;">'.$user['vendor_name'].'</h4></center>
                                    </div>
									<p>Telephone:'.$user['telephone'].'</p><br><br>
                                    <div class="row">
                                    <div class="col-lg-8">
                                            <input class="chk1" type="checkbox"  name="item_id[]" value="'.$user["vendor_username"].'" />
                                        </div>
                                    <div class="col-lg-4">
                                    <button value="editv"class="btn btn-primary" type="button" data-toggle="modal" data-target="#editv'.$i.'">Edit</button>
        <!--update vendor modal-->
        <div class="row">
            
			<div class="modal fade" role="dialog" data-toggle="modal" id="editv'.$i.'" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Edit Vendor</div>
                    </div>
                    <div class="modal-body">
					   <form role="form" method="post" action="updateven.php" enctype="multipart/form-data">
                           
								<div class="form-group">
									<label>Vendor name:</label>
									<input class="form-control" placeholder="Vendor name" name="vname" value="'.$user['vendor_name'].'"required="required">
								</div>
                                <div class="form-group" style="width:70px;">
									<label class="sr-only">Vendor ID</label>
									<input class="form-control sr-only" placeholder="ID" name="vid">
                                                                                                        
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="vmail" type="email" value="'.$user['vendor_email'].'">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Telephone</label>
									<input class="form-control" placeholder="Telephone" name="vtel" required="required" type="number" value="'.$user['telephone'].'">
								</div>
                                <div class="form-group">
									<label>Address</label>
									<input class="form-control" placeholder="Address" name="vadd" required="required" value="'.$user['vAddress'].'">
								</div>
								<div class="form-group" style="width:300px;">
									<label class="sr-only">Username</label>
									<input class="form-control sr-only" placeholder="Username" name="uname" value="'.$user['vendor_username'].'">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Password</label>
									<input type="password" class="form-control" name="vpass" required="required" value="'.$user['vendor_password'].'">
								</div>
                                <div class="form-group">
									<label>Vendor logo</label>
									<input type="file" name="logo" value="logo" required="required" value="'.$user['image_url'].'">
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary" id="add">Save</button>
                                </center>
                                <br>
									
									
                        </form>
                    </div>
					</div>
				</div>
            </div>
            
            </div>
                                    </div>
                                    </div>
								</div>
                                
							</div>
                            </div>
                          
						</div>';
                            $i++;
                           
            } 
                  
                  ?>
						
					</div>
                </div><a name="jewellary"></a>
                    
                    </div></div>
            <hr> 
                <div class="panel panel-default">
                    <div class="row">
					<div class="panel-heading">
                    <div class="col-lg-3 col-sm-4 col-md-4 col-xs-5 ">
                                
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-plus"data-toggle="modal" data-target="#addj" style="height:45px; width:45px;"></button>
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-trash "  name="del1" id="del1" style="height:45px; width:45px;"></button>
                                </div>
                                <div class="col-lg-8 col-md-8 col-xs-7">Jewellary details</div></div></div>
					<div class="panel-body">
                        <div class ="row">
                        <form role="search">
                                        <div class="form-group col-sm-4 col-lg-4" style="width:300px;">
                                            <select class="form-control" name="search" required="required" id="search">
                                                <?php foreach ($vendors as $user):?>
                                                <option><?php echo $user['vendor_username']; ?></option>
                                                <?php endforeach; ?>
									       </select>
                                        </div>
                                    <div class="input-group-btn col-sm-4 col-lg-4" style="width:300px:">
                                        <button id="go"class="btn btn-primary" type="button">Search</button>
                            </div></form></div>
                        <hr>
                    <div id="productlist">
                       
                        <?php require_once('init.php'); 
                                $query="select item_id,product_name,product_type,product_dec,product_price,image_url,vendor_username from product_items";
                                $users = mysqli_query($conn,"$query");
                            //$j = 1;
                        while($pro = mysqli_fetch_assoc($users)){
                        echo '<div id="Allproduct" id="x"."'.$pro['item_id'].'">
						<div class="col-sm-6 col-lg-3 col-md-4" style="margin-right:-17px">
							<div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb; margin-right:3px">
								<img src="../'.$pro['image_url'].'" style="height:30%;" alt="">
								<div class="caption">
                                    <div class="row" style="height:70px;">
                                    <p>&nbspPrice(Rs.) ='.$pro['product_price'].'</p>
									<h4 style="color:darkblue;"href="#">&nbsp'.$pro['product_name'].'</h4></div><br><br>
                                    <div class="row">
                                    <div class="col-lg-8">
                                            <input class="chk" type="checkbox"  name="item_id[]" value="'.$pro["item_id"].'" style="float:left;"/>
                                        </div>
                                    <div class="col-lg-4" align="right">
                                    <button value="editj"class="btn btn-primary" type="button" data-toggle="modal" data-target="#editj'.$pro["item_id"].'">Edit</button>
                                    </div>
                                    </div>
                                     <div class="row">
                <div class="modal fade" role="dialog" data-toggle="modal" id="editj'.$pro["item_id"].'" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Edit Jewellary</div>
                    
                    <div class="modal-body">
                            <form role="form" method="post" action="updatejew.php" enctype="multipart/form-data">
                                <div class="form-group" style="width:100px;">
									<label class="sr-only">Jewellary ID</label>
									<input class="form-control sr-only" placeholder="ID" name="jid" required="required" type="number" value="'.$pro['item_id'].'">
								</div>
                                <div class="form-group">
									<label>Jewellary name</label>
									<input class="form-control" placeholder="Name" name="jname" value="'.$pro['product_name'].'">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Jewellary type</label>
									<select class="form-control" name="jtype" required="required">
										<option selected>'.$pro['product_type'].'</option>
									</select>
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Price(Rs.)</label>
									<input class="form-control" placeholder="Price" name="jprice" required="required" type="number" value="'.$pro['product_price'].'">
								</div>
                                <div class="form-group">
									<label>Description</label>
                                    <textarea class="form-control" rows ="4" placeholder="Description" name="jdesc">"'.$pro['product_dec'].'"</textarea>
								</div>
                                <div class="form-group">
									<label>Jewellary design</label>
									<input type="file" name="jd" required="required" value="'.$pro['image_url'].'">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Vendor</label>
									<select class="form-control" name="vendor" required="required">
										<option selected>'.$pro['vendor_username'].'</option>
									</select>
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </center>
                        </form>        
                    </div>
            
                    
            </div>
            </div>
            </div>
            </div>
                                    
                                    
								</div>
                                 
							</div>
                            </div>
						</div>';
                            //$j++;
                        }
						 ?>
						</div>
            
            
                    </div>
                </div>
                    </div>
    <!-- Add vendor model-->
        <div class="row">
            
			<div class="modal fade" role="dialog" data-toggle="modal" id="addv" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Add Vendor</div>
                    </div>
                    <div class="modal-body">
					   <form role="form" method="post" action="addvendor.php" enctype="multipart/form-data">

								<div class="form-group" >
									<label>Vendor name</label>
									<input class="form-control" placeholder="Vendor name" name="vname" required="required">
								</div>
                                <!--<div class="form-group" style ="width:70px;">
									<label>Vendor ID</label>
									<input class="form-control" placeholder="ID" name="vid" width="20" required="required">
								</div>-->
                                <div class="form-group" style="width:300px;">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="vmail" type="email">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Telephone</label>
									<input class="form-control" placeholder="Telephone" name="vtel" required="required" type="number">
								</div>
                                <div class="form-group">
									<label>Address</label>
									<input class="form-control" placeholder="Address" name="vadd" required="required">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Username</label>
									<input class="form-control" placeholder="Username" name="uname" required="required">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Password</label>
									<input type="password" class="form-control" name="vpass" required="required">
								</div>
                                <div class="form-group">
									<label>Vendor logo</label>
									<input type="file" name="image_url" id="image_url">
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary" id="add">Add</button>
                                </center>
                                <br>			
                        </form>
                    </div>    
					</div>
				</div>
            </div></div>
        <!--Add jewellary modal-->
        <div class="row">
                <div class="modal fade" role="dialog" data-toggle="modal" id="addj" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Add jewellary</div>
                        
                    </div>
                    <div class="modal-body">
                            <form role="form" method="post" action="addjewellary.php" enctype="multipart/form-data">
                                
                                <div class="form-group">
									<label>Jewellary name</label>
									<input class="form-control" placeholder="Name" name="jname">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Jewellary type</label>
									<select class="form-control" name="jtype" required="required">
										<option selected>ring</option>
										<option>bangles</option>
										<option>earings</option>
										<option>necklace</option>
									</select>
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Price($.)</label>
									<input class="form-control" placeholder="Price" name="jprice" required="required" type="number">
								</div>
                                <div class="form-group">
									<label>Description</label>
                                    <textarea class="form-control" rows ="4" placeholder="Description" name="jdesc"></textarea>
								</div>
                                <div class="form-group">
									<label>Jewellary design</label>
									<input type="file" name="jd">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Vendor</label>
									<select class="form-control" name="vendor" required="required">
                                        <?php foreach ($vendors as $user):?>
										<option><?php echo $user['vendor_username']; ?></option>
                                        <?php endforeach; ?>
									</select>
                                    
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary">Add</button>
                                </center>
                        </form>        
                    </div>
                         
                    
            </div>
            </div>
            </div>
        
             </div>
        <!--Admin details-->
        <div class="row"><a name="admin"></a>
            <a name="aadd"></a>
                <div class="panel panel-default">
                        <div class="row">
					<div class="panel-heading" style="pull-right">
                    <div class="col-lg-3 col-sm-4 col-md-4 col-xs-5">
                                    
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-plus"data-toggle="modal" data-target="#adda" style="height:45px; width:45px;"></button>
                                    <button class="btn btn-sm btn-primary glyphicon glyphicon-trash "  name="del2" id="del2" style="height:45px; width:45px;"></button>
                        </div><div class="col-lg-8 col-md-8 col-xs-7">Admin details</div></div></div>
					<div class="panel-body">
                        <div class="admin">
                            <?php require_once('init.php'); 
                                $query="select * from admin";
                                $users = mysqli_query($conn,"$query");
                            while($row=mysqli_fetch_array($users)){
                                $admin[]=$row;
                            }
                        
				        foreach ($admin as $users):?>
                       <div class="Adminsr" id="<?php echo $users['admin_id']; ?>">
						<div class="col-sm-6 col-lg-3 col-md-4" style="margin-right:-17px">
							<div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb;">
								<div class="caption">
                                    <div class="row">
                                    <center><h4><?php echo $users['admin_name']; ?></h4></center>
                                    </div>
                                    <p><?php echo $users['admin_email']; ?></p>
                                    <h4 style="color:darkblue"><?php echo $users['telephone']; ?></h4>
                                    <center><img src="img/design.png" style="height:100px;"></center>
                                    <input class="chk" type="checkbox"  name="item_id[]" value="<?php echo $users["admin_id"];?>" style="float:left;"/>
                                </div>
                            </div>
                           </div>
                            </div><?php endforeach; ?></div></div>
            </div></div>

       <!--Add admin modal-->
             <div class="row">
            
			<div class="modal fade" role="dialog" data-toggle="modal" id="adda" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="panel-heading dark-overlay" style="background-color:#30a5ff;"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg>Add Admin</div>
                    </div>
                    <div class="modal-body">
					   <form role="form" method="post" action="addadmin.php" enctype="multipart/form-data">

								<!--<div class="form-group" style="width:100px;" >
									<label>Admin ID</label>
									<input class="form-control" placeholder="Id" name="aid" required="required" type="number">
								</div>-->
                                <div class="form-group" >
									<label>Admin name</label>
									<input class="form-control" placeholder="Admin name" name="aname" required="required">
								</div>
                                <div class="form-group" style="width:300px;" >
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="amail" required="required" type="email">
								</div>
                                <div class="form-group" style="width:300px;" >
									<label>Telephone</label>
									<input class="form-control" placeholder="Telephone" name="atel" required="required" type="number">
								</div>
                                <div class="form-group" style="width:300px;" >
									<label>Username</label>
									<input class="form-control" placeholder="username" name="auname" required="required">
								</div>
                                <div class="form-group" style="width:300px;" >
									<label>Password</label>
									<input class="form-control" placeholder="password" name="apass" required="required" type="password">
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary" id="aadd">Add</button>
                                </center>
    
                        </form></div></div></div></div></div>
                <!-- Backup-->
            <div class="row">
            <center><a name="report"></a>
                <a name="backup"></a>
        <a value="delete" class="btn btn-default btn-lg active" role="button" href="backup.php">Click here to Backup<img class="img1" src="./img/download.png" alt="" style="width:50px; height:50px;"></a>
        </center>
    </div>
        <!--Report-->
    <div class="row">
        <h2 style="margin-left:25%; color:blue;">Community Of House Of Diamante'</h2>
<div class="container">
    <div class="column">
      <form role= "form" action="test/actionpdf.php" method="post">
        <legend>Submit to generate PDF</legend>        
        <div class="form-group" style="width:300px;">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('vendor_username') AS vendors FROM vendor");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label style="font-size:15;">Number of Vendors</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i>
                    <input type="text" class="form-control" name="name" value="<?php echo $rowq['vendors']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="form-group" style="width:300px;">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('username') AS quotations FROM customerlogin");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label style="font-size:15;">Number Of Users</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" class="form-control" name="email" value="<?php echo $rowq['quotations']; ?>"></span>
                </div>
            </div>    
        </div>
        <div class="form-group" style="width:300px;">
            <label style=" font-size:15;">Number of Necklaces</label>
            <div class="controls">
                <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS necklaces FROM product_items WHERE product_type='necklace'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="url" class="form-control" name="url" value="<?php echo $rowq['necklaces']; ?>"></span>
                </div>
            </div>
        </div>
         <div class="form-group" style="width:300px;">
             <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS rings FROM product_items WHERE product_type='ring'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label style="font-size:15;">Number of Rings</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="diamond" class="form-control" name="diamond" value="<?php echo $rowq['rings']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="form-group" style="width:300px;">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS earings FROM product_items WHERE product_type='earring'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label style="font-size:15;">Number of earings</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="price" class="form-control" name="price" value="<?php echo $rowq['earings']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="form-group" style="width:300px;">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS bangles FROM product_items WHERE product_type='bangle'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label style="font-size:15;">Number of bangles</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="bangles" class="form-control" name="bangles" value="<?php echo $rowq['bangles']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="form-group" style="width:300px;">
            <label style="font-size:15;">Additional Notes</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-pencil"></i></span>
                    <textarea name="comment" class="form-control" rows="4" cols="80" placeholder="Comment (Max 200 characters)"></textarea>
                </div>
            </div>
        </div>
        
        
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn">Cancel</button>
          </div>    
        </div>
      </form>
</div>
    </div>
        
        </div>
        
	</div>	<!--/.main-->
<!--javascript and jquery-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
   
    
    <script>
        $('#go').on('click', function () {
	var sname=$('#search').val();
	//var path="http://localhost:81/hod/photohub.php?";
	//alert(sname);
	//var current="updatearticle.php?search=";
	//current+=sname;
	//path+=current;
	$.ajax({
				url:'search.php?search='+sname,
				method:'GET',
				//data:{sname: sname},
				success:function(data){
					
					$('#productlist').html(data);
					//location.href=path;
					//alert(location.href);
                    //alert("done");
                    
					articlefun();
					//window.location = url;
				}
			});
	});
    
    
    
    
    
    
    </script>
    <script>
    $(document).ready(function(){
                    $('#del').click(function(){
                        if(confirm("Are you sure you want to delete these items")){
                            //alert("aruna");
                            var id =[];
                            $(':checkbox:checked').each(function(i){
                                id[i]= $(this).val();
                            });
                            
                            if(id.length === 0){    
                            }else{   
                               // alert(id[0]);
                                $.ajax({
                                    url:'deleteven.php',
                                    method:'POST',
                                    data:{id:id},
                                    success:function(data){
                                        alert(data);
                                        for(var i=0; i<id.length ;i++){
                                            $('div#'+id[i]+'').fadeOut('slow');
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        }else{
                            return false;
                        }
                    });
                });

</script>
<script>
    $(document).ready(function(){
                    $('#del1').click(function(){
                        if(confirm("Are you sure you want to delete these items")){
                            var item_id =[];
                            $(':checkbox:checked').each(function(i){
                                item_id[i]= $(this).val();
                            });
                            
                            if(item_id.length === 0){    
                            }else{ 
                                //alert(item_id[0]);
                                $.ajax({
                                    url:'deletejew.php',
                                    method:'POST',
                                    data:{item_id:item_id},
                                    success:function(data){
                                        alert(data);
                                        for(var i=0; i<item_id.length ;i++){
                                            $('div#'+item_id[i]+'').fadeOut('slow');
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        }else{
                            return false;
                        }
                    });
                });

</script>
<script>
    $(document).ready(function(){
                    $('#del2').click(function(){
                        if(confirm("Are you sure you want to delete these items")){
                            //alert("gfdh");
                            var admin_id =[];
                            $(':checkbox:checked').each(function(i){
                                admin_id[i]= $(this).val();
                            });
                            
                            if(admin_id.length === 0){    
                            }else{   
                                //alert(admin_id[0]);
                                $.ajax({
                                    url:'deleteadd.php',
                                    method:'POST',
                                    data:{admin_id:admin_id},
                                    success:function(){
                                        for(var i=0; i<admin_id.length ;i++){
                                            $('div#'+admin_id[i]+'').fadeOut('slow');
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        }else{
                            return false;
                        }
                    });
                });
    </script>
    <script>
    $(document).ready(function(){
                    $('#add').click(function(){
                        if(confirm("Are you sure you want to delete these items")){
                            var id =[];
                            $(':checkbox:checked').each(function(i){
                                id[i]= $(this).val();
                            });
                            //alert(id[0]);
                            if(id.length === 0){    
                            }else{   
                                $.ajax({
                                    url:'deletetmp.php',
                                    method:'POST',
                                    data:{id:id},
                                    success:function(){
                                        for(var i=0; i<id.length ;i++){
                                            $('div#'+id[i]+'').fadeOut('slow');
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        }else{
                            return false;
                        }
                    });
                });
    </script>
    <script>
                $('#del').prop("disabled", true);
                $('input:checkbox').click(function() {
                    if ($(this).is(':checked')) {
                        $('#del').prop("disabled", false);
                    } else {
                    if ($('.chk').filter(':checked').length < 1){
                        $('#del').attr('disabled',true);}
                    }
                });
                $('#del1').prop("disabled", true);
                $('input:checkbox').click(function() {
                    if ($(this).is(':checked')) {
                        $('#del1').prop("disabled", false);
                    } else {
                    if ($('.chk').filter(':checked').length < 1){
                        $('#del1').attr('disabled',true);}
                    }
                });
                $('#del2').prop("disabled", true);
                $('input:checkbox').click(function() {
                    if ($(this).is(':checked')) {
                        $('#del2').prop("disabled", false);
                    } else {
                    if ($('.chk').filter(':checked').length < 1){
                        $('#del2').attr('disabled',true);}
                    }
                });
                

</script>
<script>
    
    
	
        
        
        
</script>      
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
        $
	</script>
    <script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
            
</body>

</html>