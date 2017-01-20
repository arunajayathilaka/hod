<style >
    #watermark{
        
    }
</style>
<body>  
        <?php include 'init.php'?>
        <?php include 'update.php'?>
        <?php include 'header.php'?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!--<a class="navbar-brand" href="#"><img src="img/logo21.png" class="img-responsive" style="height:100px; width:190px;margin-top: -15px;">    </a>-->
                                <ul class="list-inline" style="float: right ;padding-top: 15px;">
                                    <li style="color: #E1E1E1;"><?php echo $_SESSION['login_user']?></li>
                              
                                </ul> 
                        </div>

		</div><!-- /.container-fluid -->
	</nav>
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="">
                    <img src="img/logo2.png" class="img-responsive center-block" style="height:100px; width:200px">
                </div>  
		<ul class="nav menu">
			<li><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Products</a></li>
			<li><a href="tables.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg>Quotations</a></li>
                        <li class="active"><a href="forms.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg>Edit</a></li>
			<li><a href="panels.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg>Chat</a></li>
			<li><a href="widgets.php"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Uploads</a></li>
                        <li><a href="logout.php" style="text-decoration: none !important; cursor:pointer; margin-right:10px;" id="signin"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
	<?php
        
            //select all details about vendor
        
            $query1 = "SELECT* FROM vendor WHERE  vendor_email='{$_SESSION['login_user']}'";
            $resq = mysqli_query($con,$query1);
            $rowq = mysqli_fetch_array($resq,MYSQLI_ASSOC);
            
        ?>
        
        <!--display vendor details in textfields and text areas-->
        
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Edit</li>
			</ol>
		</div><!--/.row-->
		
		
			
		
		<div class="row">
                    <div class="col-lg-12">
                            
                        <div id="detailchanger" style="background-color:#e9ecf2;;">
                            </br>
                            <form method="post"  enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" >
                                <div class="row">
                                    <div class="form-group" >
                                        <div class="col-lg-8">
                                            <div style="float: right; border:2px solid gray"  id="watermark" >
                                                <input id="imginp" style="display:none" onchange="readURL(this,'disimg');" type="file" name="ima"  value="<?php echo $rowq['image_url'] ;?>" />
                                                <img class="img-responsive"id="disimg" onclick="openBrowse('imginp')" src="../<?php echo $rowq['image_url']  ;?> " style="height:200px; width:400px;" alt="+"/>
                                                <div class="row">
                                                    <div class="col-xs-2"><img src="img/Camera.png"class="img-responsive"id=""  style="height:20px; width:20px;"/></div>
                                                    <div class="col-xs-6">Update Profile Picture</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <br/>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <div class="" style="float: right;">New Name</div>
                                    </div>
                                    <div class="col-lg-5"><input type="text"  id="cName" name="cName" value="<?php echo $rowq['vendor_name'];?>" class="form-control " /></div><!--a id="namepencil" value="cName" ><span class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                    
                                </div>
                            </div>
                            
                            <div class="row"><div class="col-lg-8 col-lg-offset-3" ><span class="error" style="color: red;"><?php echo $nameerror ;?></span></div></div>
                            <br/>


                            <br/>

                            <div class="row">
                                <div class="form-group ">
                                    <div class="col-lg-3">
                                        <div class="" style="float: right;">Current Password</div>
                                    </div>
                                    <div class="col-lg-4"><input type="password"  name="currentpassword" value="" class="form-control"  /></div><a><span  class=""style="float: right;"></span></a>
                                </div>
                            </div>
                            </br>
                            <div class="row">        
                                <div class="form-group ">
                                    <div class="col-lg-3"><div style="float: right;">New Password</div></div>
                                    <div class="col-lg-4"><input type="password" id="newpassword" name="newpassword"class="form-control"   /></div><!--a id="passpencil" value="newpassword"><span  class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                    
                                </div>
                            </div>
                            </br>
                            <div class="row">        
                                <div class="form-group">
                                    <div class="col-lg-3"><div style="float:right;">Confirm Password</div></div>
                                    <div class="col-lg-4"><input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  /></div><!--a id="cpasspencil" value="confirmpassword"><span  class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                    
                                </div>
                            </div>
                            
                            <div class="row"><div class="col-lg-8 col-lg-offset-3" ><span class="error" style="color: red;"><?php echo $passerror ;?></span></div></div>
                         

                                   
                                

                            <br/>
                            <br/>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3"><div style="float: right;">New Address</div></div>
                                    <div class="col-lg-6"><textarea rows="5"class="form-control"  id="address" name="address"><?php echo $rowq['vAddress'];?></textarea></div><!--a id="addpencil" value="address"><span class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                </div>
                            </div>
                           <div class="row"><div class="col-lg-8 col-lg-offset-3" ><span class="error" style="color: red;"><?php echo $adderror ;?></span></div></div>


                           <br/>
                            <br/>

                            <div class="row">
                                <div class="form-group ">
                                   <div class="col-lg-3"><div style="float: right;">New Email</div></div>
                                   <div class="col-lg-6"><input type="email" id="email" name="email" value="<?php echo $rowq['vendor_email'];?>" class="form-control" /></div><!--a id="emailpencil" value="email"><span class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                </div>

                            </div>

                            <div class="row"><div class="col-lg-8 col-lg-offset-3" ><span class="error" style="color: red;"><?php echo $emerror ;?></span></div></div>
                            </br>
                            <br/>

                            <div class="row">
                                <div class="form-group ">
                                    <div class="col-lg-3"><div style="float: right;">Telephone Number</div></div>
                                    <div class="col-lg-4"><input type="text" id="contact" name="contact" value="<?php echo $rowq['telephone'];?>" class="form-control" /></div><!--a id="telpencil" vlaue="contact"><span class="glyphicon glyphicon-pencil"style="float: right;"></span></a-->
                                </div>
                            </div>
                            <div class="row"><div class="col-lg-8 col-lg-offset-3" ><span class="error" style="color: red;"><?php echo $telerror ;?></span></div></div>
                            </br>
                            </br>
                            <div class="row">
                                <div class="col-lg-8"></div><div class="col-lg-3"><button class="btn btn-primary  pull-right" name="submit" value="submit">Submit</button></div>
                            </div>
                            </br>
                            </form>
                            
                        </div>
                    </div><!-- /.col-->
		</div><!-- /.row -->    
		</br>
	</div><!--/.main-->
        <script>
            
            //open for browse when clicked on img
            
            function openBrowse(id){
                $('#'+id).click();
                
            }
            
            //read selected image 
            
            function readURL(input,cimg) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                      $('#'+cimg)
                        .attr('src', e.target.result);
                        
                    };
                    reader.readAsDataURL(input.files[0]);
              }
            }
        </script>
            
<?php include 'footer.php'?>
        
