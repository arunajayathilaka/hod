<?php include 'header.php';?>
<?php include 'session.php';?>
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
			<li ><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="charts.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Products</a></li>
			<li><a href="tables.php"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg>Quotations</a></li>
			<li><a href="forms.php"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg>Edit</a></li>
			<li><a href="panels.php"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"></use></svg>Chat</a></li>
                        <li class="active"><a href="widgets.php"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Uploads</a></li>
                        <li><a href="logout.php" style="text-decoration: none !important; cursor:pointer; margin-right:10px;" id="signin"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                        
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Uploads</li>
			</ol>
		</div><!--/.row-->
		</br>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Upload Slider Images
                            </div>
                            <form method="post" id="uploadForm"  enctype="multipart/form-data">
                            <div class="panel-body" style="height: 380px; overflow-y: scroll;">
                                
                                <label >Product Image</label><input name="files[]" id="files1" type="file" multiple="true" onchange="previewFile()"><br>
                                </br>
                            </div>
                            <div class="panel-footer">
                                <input type="submit" style=""value="Submit"  />
                            </div>
                            </form>
                        </div>
                        
                    </div>
                   
                    
                </div>
		
                
	</div>	<!--/.main-->
        <script>
            $(document).ready(function() {
                
                if(window.File && window.FileList && window.FileReader) {
                    $("#files1").on("change",function(e) {
                        var files = e.target.files, 
                        filesLength = files.length ;    
                        if(filesLength<=3){
                            for (var i = 0; i < filesLength ; i++) {
                                var f = files[i]
                                var fileReader = new FileReader();
                                fileReader.onload = (function(e) {
                                    var file = e.target;
                                    $("<img ></img>",{
                                        class : "imageThumb",
                                        src : e.target.result,
                                        width: 100,
                                        height:100,
                                        title : file.name
                                    }).insertAfter("#files1");
                                });
                                fileReader.readAsDataURL(f);
                            }
                        }
                        else{
                            alert("Please choose less than three images.");
                        }
                        
                    });
                   
                }else {
                    alert("Your browser doesn't support to File API") 
                }
            });
            
        
           $(document).ready(function(){
               $('#uploadForm').on('submit',function(e){
                   var numFiles = $("input:file")[0].files.length;
		   if(numFiles>0){
		           if(numFiles<=3){    
		                $.ajax({
		                    url:"imageupload.php",
		                    type:"POST",
		                    data:new FormData(this),
		                    contentType:false,
		                    processData:false,
		                    success:function(data){
		                        alert(data);
		                    }
		                });
		           }
		           else{
		               alert("you can not upload more than 3");
		           }
		  }else{
			alert("Please select images")
		  }
               });
            
           });
           
           function clearimage(){
               alert("alksdl");
           }     
                
               
        
        </script>
		  
<?php include 'footer.php';?>
