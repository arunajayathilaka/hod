
<?php include 'header.php';?>
<?php include 'chatdetails.php';?>
<body>
    
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
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Juwellery</a></li>
			<li><a href="tables.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg>Message</a></li>
			<li><a href="forms.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
			<li><a href="panels.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg>Chat</a></li>
			<li><a href="widgets.php"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Uploads</a></li>
                        <li><a href="logout.php" style="text-decoration: none !important; cursor:pointer; margin-right:10px;" id="signin"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                    <li class="active">Chat</li>
                </ol>
            </div><!--/.row-->
                <br/>
                <br/>
                <?php
                    $loadcustomersql = "SELECT * FROM customerlogin";
                    $rescustomer = mysqli_query($con,$loadcustomersql);
                    $rowcustomer = null;
                    while ($rowcustomer = mysqli_fetch_array($rescustomer)) {
                        $logincustomer[] = $rowcustomer;
                    }
                ?>    
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
                                            Users
                                        </div>
                                        <div class="panel-body" style="height: 280px; overflow-y: scroll;">
                                            <ul class="media-list">

                                                <li class="media">

                                                    <div class="media-body">

                                                        <div class="media" >
                                                            <?php foreach ($logincustomer as $customer):?>
                                                            <div class="vendor" onclick="select('<?php echo $customer['username'];?>');">
                                                                
                                                                <a class="pull-left" value="mallika">
                                                                    <img class="media-object img-circle" style="max-height:40px;" src="<?php echo $customer['image_url']?>" />
                                                                </a>
                                                                
                                                                <div class="media-body" >
                                                                    <h5><?php echo $customer['username'];?></h5>
                                                                    <small class="text-muted"></small>
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
        
        <script >
            function select(inputcus){
               
                $.ajax({
                    url:'chatdetails.php',
                    method:'POST',
                    data:{inputcus:inputcus},
                    success:function(data){
                         $('#messages').html(data);
                         $('#send').val(inputcus);
                         
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
                                alert(data); 
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
<?php include 'footer.php';?>