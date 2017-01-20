<?php include 'header.php'?>
<body>
   
    <?php include 'update.php'?>
    <?php include 'init.php'?>
    <?php include 'dolist.php';?>
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
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Products</a></li>
			<li><a href="tables.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg>Quotations</a></li>
			<li><a href="forms.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg>Edit</a></li>
			<li><a href="panels.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg>Chat</a></li>
                        <li><a href="widgets.php"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Uploads</a></li>
                        <li><a href="logout.php" style="text-decoration: none !important; cursor:pointer; margin-right:10px;" id="signin"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                        

                </ul>

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
            <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
            </div><!--/.row-->
            
            <?php
            $sql1 = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
            $res1 = mysqli_query($con,$sql1);
            $row = mysqli_fetch_assoc($res1);
            ?>
            <!--div class="row">
                <div class="col-lg-12" style="height:250px;">
                    <div class="row">
                        <div class="col-lg-12" style="height:170px; background-color:#30a5ff; padding-top: 90px;  padding-left: 80px; ">
                            <img class="img-circle" style="height:150px;"alt="Profile image" class="img-responsive"src="<?php echo "{$row['image_url']}"; ?>">
                        </div>
                    </div>

                </div>
            </div--> 
            </br>
            <div class="row">
                 
                 
               <?php 
               
               //count number of product items, unread quatations,ratings 
               
               
                    $sql14 = "SELECT * FROM product_items WHERE  vendor_username='{$row['vendor_username']}' ";
                    $ji = mysqli_query($con,$sql14);
                    $items=mysqli_num_rows($ji);
                            
                    $sql15 = "SELECT * FROM quotation WHERE  vendor = '{$row['vendor_username']}' AND  view='no' ";
                    $qu = mysqli_query($con,$sql15);
                    $quitems=mysqli_num_rows($qu);
                    
                    $sql16 = "SELECT * FROM rating WHERE  vendor_username = '{$row['vendor_username']}'";
                    $ra = mysqli_query($con,$sql16);
                    $raitem = mysqli_num_rows($ra);
                    
                    
               ?>
                <!--display number of items-->
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="panel panel-blue panel-widget ">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-4 widget-left">
                                <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-8 widget-right">
                                <div class="large"><?php echo $items;?></div>
                                <div class="text-muted">Jewellery</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--display number of unread quatations-->
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="panel panel-orange panel-widget">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-4 widget-left">
                                <svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-8 widget-right">
                                <div class="large"><?php echo $quitems;?></div>
                                <div class="text-muted">Quototaion</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--display number of ratings-->
                
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="panel panel-teal panel-widget">
                        <div class="row no-padding">
                            <div class="col-sm-3 col-lg-4 widget-left">
                                <svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg>
                            </div>
                            <div class="col-sm-9 col-lg-8 widget-right">
                                <div class="large"><?php echo $raitem;?></div>
                                <div class="text-muted">Ratings</div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-8" style="height:420px;">
                    
                    <!--display vendor logo-->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <img class="img-responsive" src = "../<?php echo "{$row['image_url']}"; ?>"style="height:200px; width: 80%"/>
                        </div>
                    </div>
                    </br>
                    
                    <!--display vendor name -->
                    
                    <div class="row">
                        <div class="col-lg-12" style="font-size:16px;  color:black ;padding-left: 60px;">
                            <div class="row">
                                <div class="col-lg-2">Name</div><div class="col-lg-5"><?php echo "{$row['vendor_name']}"; ?></div>
                            </div>
                            
                        </div>
                    </div> 
                    <br/>
                    
                    <!--display vendor address -->
                    
                    <div class="row">
                        <div class="col-lg-12" style="font-size:16px;color: black;padding-left: 60px;">
                            <div class="row">
                                <div class="col-lg-2">Address</div><div class="col-lg-5"><?php echo "{$row['vAddress']}"; ?></div>
                            </div>               
                        </div>
                    </div> 
                    <br/>
                    
                    <!--display vendor telephone -->
                    
                    <div class="row">
                        <div class="col-lg-12" style="font-size:16px; color: black; padding-left: 60px;">
                            <div class="row">
                                <div class="col-lg-2">Tel</div><div class="col-lg-5"><?php echo "{$row['telephone']}"; ?></div>
                            </div>                           
                        </div>
                    </div> 
                    <br/>
                    
                    <!--display vendor email -->
                    
                    <div class="row">
                        <div class="col-lg-12" style="font-size:16px; color: black; padding-left: 60px;">
                            <div class="row">
                                <div class="col-lg-2">Email</div><div class="col-lg-5"><?php echo "{$row['vendor_email']}"; ?></div>
                            </div>                
                        </div>
                    </div> 

                </div>
                
                <?php
                
                    //selecting all dolist information
                
                    $sqldose = "SELECT * FROM dolist WHERE vendor='{$row['vendor_username']}'";
                    $resdo = mysqli_query($con,$sqldose);
                    $count = mysqli_num_rows($resdo);
                    $doit = null;
                    while ($rowdo = mysqli_fetch_array($resdo)){
                        $doit[] = $rowdo;
                    }
                ?>
                
                <!--dolist-->
                
                <div class="col-lg-4" >
                    <div class="panel panel-primary" style="height:400px;">
                        <div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>To-do List</div>
                        <div class="panel-body " style="height:300px;overflow-y: scroll;"id="paneldo">
                            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="panelform" >
                            <ul class="todo-list"  >
                                <input class="sr-only" value="<?php echo $row['vendor_username']?>" id="ven"/>
                                <?php if($count>0):?>
                                <?php foreach ($doit as $dolistitem):?>
                                <li class="todo-list-item" id="<?php echo $dolistitem['doId']?>">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox" />
                                        <label for="checkbox"><?php echo $dolistitem['task']?></label>
                                    </div>
                                    <div class="pull-right action-buttons">
                                        <a href="#" class="trash" onclick="deldo('<?php echo $dolistitem['doId']?>');"><svg class="glyph stroked trash" ><use xlink:href="#stroked-trash"></use></svg></a>
                                    </div>
                                </li>
                                <?php endforeach;?>
                                <?php endif;?>
                            </ul>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input  type="text" id="task1" class="form-control input-md" placeholder="Add new task" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-md" onclick="dolist();" id="btn-todo">Add</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
            
	</div>	<!--/.main-->
        <script >
            
            //reload the panelform div in dolist
            
            function load(){
                $(document).ready(function(){
                        $("#panelform").load('index.php #panelform');
                        //location.reload();  
                 });

            }
            
            //dolist :insert item to dolist
            
            function dolist(){
                var dol = $('#task1').val();
                var ven =$('#ven').val();
                $.ajax({
                    url:'dolist.php',
                    method:'POST',
                    data:{dol:dol,ven:ven},
                    success:function(){
                       $('#task1').val(" ");
                       load();
                    }
                });

                
            }
            
            //send selected item to delete and remove form dolist
            
            function deldo(inputdo){
                if(confirm("Are you sure you want to delete these items")){
                    var ven =$('#ven').val();
                    $.ajax({
                        url:'dolist.php',
                        method:'POST',
                        data:{inputdo:inputdo,ven:ven},
                        success:function(){
                            $('li#'+inputdo).fadeOut();
                        }
                    });
                }
            }
        </script>

<?php include 'footer.php';?>