<?php include 'header.php'?>
<style > 
    .red{
        background-color: red;
    }
    
</style>
<body>
    
    <?php include 'init.php';?>
    <?php 
       include 'pdf.php';
    ?>
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
                    <li class="active">Message</li>
                </ol>
            </div><!--/.row-->
                <br/>
                <div class="row">
                    
                    <div class="panel panel-default" >
                        <div class="panel-heading" >
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-md-5 col-xs-8" >
                                    <button  class="btn btn-lg btn-primary  glyphicon glyphicon-refresh" id="juwel" onclick="load();" ></button>           
                                    <button class="btn btn-lg btn-primary glyphicon glyphicon-trash " name="del" id="delete" onclick="delete1();" ></button>
                                </div>
                               
                                <div class="col-lg-5 col-xs-4 col-sm-5 col-md-5" style="float:right; margin-top:7px;">
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="searchtext" placeholder="Type Model number"  />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary  glyphicon glyphicon-search" id="searchcriteria"   type="button" onclick="tablesearch();" style="margin-top:-13px;"></button>
                                        </span>
                                        
                                    </div>
                                    
                                </div>
                               
                            
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs">                            
                            <li class="active"><a data-toggle="tab"href="#receive">Quotation</a></li>
                        </ul>
                        
                        <div class="tab-content">
                            
                            <?php
                            $sql9 = "SELECT vendor_name FROM vendor WHERE vendor_email= '{$_SESSION['login_user']}'";
                            $res9 = mysqli_query($con,$sql9);
                            $row9 = mysqli_fetch_array($res9, MYSQLI_ASSOC);
                            $sqlny = "SELECT * FROM quotation WHERE  vendor = '{$row9['vendor_name']}' AND view = 'yes'";
                            $resny = mysqli_query($con,$sqlny);
                            $sqlno = "SELECT * FROM quotation WHERE  vendor = '{$row9['vendor_name']}' AND view = 'no'";
                            $resno = mysqli_query($con,$sqlno);
                            //$row3= mysql_fetch_array($res3, MYSQL_ASSOC);
                            //$productQuery=mysql_query("SELECT product_items.product_name,product_items.product_dec,product_items.product_price,product_items.image_url FROM product_items");
                            $receiveno = null;
                            $receiveny = null;
                            while ($rowny = mysqli_fetch_array($resny)) {
                                $receiveny[] = $rowny;
                            }
                            while ($rowno = mysqli_fetch_array($resno)) {
                                $receiveno[] = $rowno;
                            }
                            ?>
                            <div class=""style="height:400px;">
                            <div class="tab-pane fade in active " style="height:400px;overflow-y: scroll;"  id="receive">
                                <div id="receive11">
                                <table class="table ">
                                    <?php if (count($receiveny)>0):
                                        foreach ($receiveny as $productny): ?>
                                            <tr id="<?php echo "{$productny['id']}"; ?>" onclick="setcolor(<?php echo "{$productny['id']}"; ?>);" style="background-color:#b4b3b3;">
                                                <th class="tableheader" data-field="state" data-checkbox="true" data-formatter="starsFormatter" style="width:200px;" onclick="setcolor();">
                                                    <input class="chk2" type="checkbox"  onclick="check();"name="item2" value="<?php echo $productny["id"];?>"/>
                                                </th>
                                                <td class="tableheader" style="width:400px;">Qutaion for :<?php echo "{$productny['full_name']}"; ?></td>
                                                <td style="width:40px;"><button class="btn btn-primary" value="<?php echo $productny['id']?>" onclick="viewquota(<?php echo $productny['id']?>); readmodal(<?php echo $productny['id']?>);"  data-toggle="modal" data-target="#read">View  </button></td>
                                                <td style="width:40px;"><button class="btn btn-primary" data-toggle="modal" data-target="#additionaldetails" onclick="accept(<?php echo $productny['id']?>);">Accept</button></td>
                                                <td style="width:40px;"><button class="btn btn-primary" onclick="reject('<?php echo $productny['id']?>');">Reject</button></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        
                                        endif;
                                          
                                       ?>
                                        <?php if (count($receiveno)>0):
                                        foreach ($receiveno as $productno): ?>
                                            <tr id="<?php echo "{$productno['id']}"; ?>" onclick="setcolor(<?php echo "{$productno['id']}"; ?>);">
                                                <th class="tableheader" data-field="state" data-checkbox="true" data-formatter="starsFormatter" style="width:200px;" onclick="setcolor();">
                                                    <input class="chk2" type="checkbox"  onclick="check();"name="item2" value="<?php echo $productno["id"];?>"/>
                                                </th>
                                                <td class="tableheader" style="width:400px;">Qutaion for :<?php echo "{$productno['full_name']}"; ?></td>
                                                <td style="width:40px;"><button class="btn btn-primary" value="<?php echo $productno['id']?>" onclick="viewquota(<?php echo $productno['id']?>); readmodal(<?php echo $productno['id']?>);resetTimeout();"  data-toggle="modal" data-target="#read">View  </button></td>
                                                <td style="width:40px;"><button class="btn btn-primary" data-toggle="modal" data-target="#additionaldetails" onclick="accept(<?php echo $productno['id']?>);">Accept</button></td>
                                                <td style="width:40px;"><button class="btn btn-primary" onclick="reject('<?php echo $productno['id']?>');">Reject</button></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        
                                        endif;
                                        
                                        ?>
                                       
                                           
                                </table>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                

        </div><!--/.main-->
        <!--  modal for compose button-->
        <div class="modal fade" role="dialog" id="compose" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <span class="glyphicon glyphicon-envelope"></span>
                        <h4>Compose Message</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="mail.php">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">To</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="to"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="date"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="price" type="text"/>
                                </div>
                            </div>
                            <div >
                                <label >Design image</label>
                                <input name="desimage"  type="file" onchange="previewFile()"/><br>
                                <div><img src="" height="200" id="itemimage"  alt="Image preview..."></div>
                            </div>


                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn btn-default" name="send" value="send">Send</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!--end  modal for compose button-->
        
        
        <!--  modal for view button-->
        <div class="modal fade" role="dialog" id="read" >
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="readmessage">
                 <!-- content of this modal is in readqouta.php -->
                    
                </div>
            </div>
        </div>
        <!--end  modal for view button-->
        <div class="modal fade" role="dialog" id="additionaldetails" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        
                        <h4>Additional Details</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                             <div class="form-group">
                                
                                <div class="col-sm-9">
                                    <input style="display:none"type="text" id="senderclient"name="num"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Estimated price</label>
                                <div class="col-sm-7">
                                    <div class="input-group">
                                    
                                        <div class="input-group-addon">Rs</div>
                                            <input class="form-control"type="text" name="estiprice"/>
                                        <div class="input-group-addon">.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Discription</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" type="text" name="additional"id="additional"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                                <input class="btn btn-default" type="submit" name="clientsend"  onclick="echomessage();" value="send">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        
        
        
        
        <?php
           // setcookie("color", "red");  
        ?>
        <script>
             
            function previewFile(){
                var preview = document.querySelector('#itemimage'); //selects the query named img
                var file    = document.querySelector('input[type=file]').files[0]; //sames as here
                var reader  = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file); //reads the data as a URL
                } else {
                    preview.src = "";
                }
            }

            previewFile();  //calls the function named previewFile()
        </script>
        <script type="text/javascript">
            function check(){
                $(document).ready(function(){
                    $('#delete').prop("disabled", true);
                    $('input:checkbox').click(function() {
                    if ($(this).is(':checked')) {
                        $('#delete').prop("disabled", false);
                    } else {
                        if ($('.chk2').filter(':checked').length < 1){
                            $('#delete').attr('disabled',true);}
                    }
                    }); 
                    
                });
            }
             check();
        </script>
        <script type="text/javascript">
            
            
            function delete1(){
                $(document).ready(function(){
                    if(confirm("Are you sure you want to delete these items")){
                    var tid1 =[];
                    $('input[name=item2]:checked').each(function(i){
                        tid1[i]= $(this).val();
                        if(tid1.length === 0){    
                        }else{   
                            $.ajax({
                                url:'ProductDetails.php',
                                method:'POST',
                                data:{tid1:tid1},
                                success:function(){
                                    for(var i=0; i<tid1.length ;i++){
                                        $('tr#'+tid1[i]+'').fadeOut('slow');
                                        $('#delete').attr('disabled',true);
                                    }
                                }
                            });
                        }
                    });

                    }else{
                        return false;
                    }
                   
                });
            }
        </script>
        <script>
            function readmodal(input0){
                alert('r'+input0);
                $.ajax({
                    url:'readquota.php',
                    method:'POST',
                    data:{read:input0},
                    success:function(data){
                        $('#readmessage').html(data);
                        check();
                    }
                });
                
            }
            
            function viewquota(input1){
                $.ajax({
                    url:'ProductDetails.php',
                    method:'POST',
                    data:{view:input1},
                    success:function(){
                        alert('tr#'+input1);
                        $("#receive11").load('tables.php #receive11');
                        
                    }
                });
              
            }
            function tablesearch(){
                var searchcri = $('#searchtext').val();
                if(searchcri!==""){
                    $.ajax({
                        url:'tablesearch.php',
                        method:'POST',
                        data:{searchcri:searchcri},
                        success:function(data){
                            if(data!==""){
                                $('#receive').html(data);
                            }else{
                                alert("There are no items with this number");
                            }
                            $('#searchtext').val("");
                            check();
                            
                        }
                    });
                }
                else{
                    alert("Enter a correct model number");
                }
            }
            function reject(inputreject){
                alert(inputreject);
                $.ajax({
                    url:'pdf.php',
                    method:'POST',
                    data:{inputreject:inputreject},
                    success:function(data){
                       if(data=='1'){
                            alert("Sucessfully sent!!!");
                       }else{
                           alert("Error occured while sending!!!");
                       }
                    }
                });
                
            }
        </script>
        <script >
            function load(){
                $(document).ready(function(){
                        $(".tab-content").load('tables.php .tab-content');
                        location.reload();  
                 });

            }
        
        </script>
        <script >
            function accept(input4){
                alert(input4);
                $('#senderclient').val(input4);
            }
        </script>
        <script type="text/javascript">
           function echomessage(){
               alert("Sending!!!");
           }
           
        </script>
<?php include 'footer.php'?>