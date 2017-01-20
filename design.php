<?php 
    require_once 'init.php'; 
    
    $_SESSION['N2']=$_SESSION['N1']=$_SESSION['N4']=$_SESSION['N5']="";
    $_SESSION['N3']="activenav";
    
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Design</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">	
    <!-- Custom CSS -->
    <link href="css/home.css" rel="stylesheet">
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
     
	
    
	<style>
	.clickable{
		cursor: pointer;   
	}

	.panel-heading span {
		margin-top: -20px;
		font-size: 15px;
	}
	.thumbnail:hover {
            opacity: 0.5;
            filter: alpha(opacity=50);
	
        }
        
	
	.selected{
		box-shadow:0px 12px 22px 1px #333;
		opacity: 0.5;
		filter: alpha(opacity=50);
	}
        .dpanel{
            height:380px; 
            margin-top:20px;
            background-color: rgba(230,238,255,0.5);
        }
        @media only screen and (max-width:767px){
           .dpanel{
                height:50%;
            }
        }
	
        .border1{
            border-color: #1260d4;
        }
	</style>
</head>

<body style="background-color:#FFF6; background-size: 100% 100%;" >
		<?php 
		if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
		else{$_SESSION['er1']="false";}?>
		<?php include 'template/menu.php' ?>
		
	 <?php include 'template/headnav.php';?>   
	
         <?php include("alert.php"); ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
			
				 
                <div class="panel panel-default"style="margin-top:20px;background-color: rgba(230,238,255,0.5);">
                    <div class="panel-heading">Types</div>
                        <div class="panel-body" style="height:338px; overflow-y: scroll;overflow-x:hidden; white-space:nowrap;">
                            <div id="f4">
					<?php 
						$sql3q1=mysqli_query($link,"SELECT * FROM ringtype");
						 while($row=mysqli_fetch_array($sql3q1)){
						 $ringtypes[]=$row;	
						}
					?>
					<?php foreach($ringtypes as $ringtype): ?>
						<div class="thumbnail transthumb text-center" style="height:auto; width:100px; display:inline-block; margin: 5px 5px 5px 5px;">
							<a id="<?php echo $ringtype['id']; ?>" value="<?php echo $ringtype['gem_n']; ?>" role="button"><img src="<?php echo $ringtype['image_url']; ?>" alt=""></a>							
						</div>
                                               
					<?php endforeach;?>
                            </div>
			</div>
					
			
					
                    </div>
		</div>
			<div class="col-md-6">
				 <!-- Modal -->
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content" style="background-color: rgba(230,238,255,1);">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Call Quotation</h4>
						</div>
						<div class="modal-body" id ="modalq" style="height:380px; overflow-y: scroll;" >
						    <div id="falertdiv"class="alert alert-danger" style="display:none" role="alert"><p id="falert"></p></div>
                                                    <div class="form-group">
								<label>Full Name</label>
								<textarea id="fullname" class="form-control" rows="1"></textarea>
							</div>
							<div class="form-group">
								<label>E mail</label>
								<textarea type="email" id="email" class="form-control" rows="1"><?php echo $_SESSION['emailn'];?></textarea>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
								<textarea id="phone_n"class="form-control" rows="1"></textarea>
							</div>
							<div class="form-group">
									<label>Selected the ring</label>
									
									
							</div>
							<div id="image"></div>
                                            	<!--	<iframe style="display:none;" name="iframe"></iframe>
							<div class="form-group" id="fileup" >
								<label>photo of ring</label>
								<form name="upload" action="uploadimage.php" enctype="multipart/form-data" method="post" target="iframe" >
								 <input type="file" id="ringimage" name="ringimage"/><br>
								 <input type="submit" name="submit" value="Upload Image"/>
								</form>
								<p class="help-block">input JPG or PNG</p>
							</div> -->
                                                        <div class="form-group">
								<label>Vendor Name</label>
								<select id="vendor_s" class="form-control">
								<option> </option>
                                                                    <?php
                                                                        $sql3q2=mysqli_query($link,"SELECT * FROM vendor");
                                                                        while($row=mysqli_fetch_array($sql3q2)){
                                                                            $vendors[]=$row;	
                                                                        }

                                                                    ?>
                                                                    <?php foreach($vendors as $vendor):?>
                                                                    <option value="<?php echo $vendor['vendor_username']; ?>" name="<?php echo $vendor['image_url'];?>"><?php echo $vendor['vendor_name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
							</div>
							<div class="form-group">
								<label>Ring Size</label>
								<select id="ring_s" class="form-control">
                                                                    <option> </option>
                                                                        <option>Size 5</option>
									<option>Size 6</option>
									<option>Size 7</option>
									<option>Size 8</option>
                                                                        <option>Other</option>
								</select>
								<a href="http://www.ringsizes.co/" target="_blank"><small>more ring sizes</small></a>
							</div>
							<div class="form-group">
								<label>Carrot Weight</label>
								<select id="carrot_w"class="form-control">
                                                                        <option> </option>
									<option>14ct</option>
									<option>20ct</option>
									<option>22ct</option>
								</select>
							</div>
							<div class="form-group">
								<label>Metal</label>
								<textarea id="metal" class="form-control" rows="1"></textarea>
							</div>
							<div class="form-group">
								<label>Gemstone</label>
								<textarea id="gemstone" class="form-control" rows="1"></textarea>
							</div>
							<div class="form-group">
								<label>Center Cut</label>
								<textarea id="centercut" class="form-control" rows="1"></textarea>
							</div>
							
							<button id="qoutationb" type="submit" class="btn btn-primary">Submit</button>
						</div>
						
					  </div>
					  
					</div>
				  </div>
				<div id="3dpanel" class="panel panel-default dpanel" style="">
				<div class="panel-body">
				<div class="row text-center" >
				<iframe style="width: 100%;height: 80%;"src="https://lagoa.com/embed_links/7342?validationHash=ZeOLw0hs1wVbl_NgaUpHdzjjBsFvqw&width=500&height=280&auto_load_scene=true&asset_name=false&owner_name=false&lagoa_logo=false&version_number=21" 
				id="lagoaframe" width="500" height="280" scrolling="no" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				</div>
				<div class="text-right" style="margin-top:10px; margin-right:10px;">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Call Quotation</button>
				</div>
				</div>
				
			</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default" style="height:380px; margin-top:20px; overflow-y: scroll; background-color: rgba(230,238,255,0.5);">
                                    <div class="panel-heading">Customise</div>
                                        <div class="panel-body" >
						<div class="panel panel-info" id="pan">
								<div class="panel-heading">
									<h3 class="panel-title">Metals</h3>
									<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
								</div>
								<div class="panel-body" id="p1">
								<div id="f1">
									<?php 
									$sql3q2=mysqli_query($link,"SELECT * FROM metal");
									 while($row=mysqli_fetch_array($sql3q2)){
									 $metalrs[]=$row;	
									}
								?>
								<?php foreach($metalrs as $metalr): ?>
									<div class="thumbnail transthumb text-center" style="height:auto; width:50px; float:left; margin: 5px 5px 5px 5px;">
										<a id="<?php echo $metalr['id']; ?>" value= "<?php echo $metalr['model_name']; ?>" role="button"><img src="<?php echo $metalr['image_url']; ?>" style="height:50px;"alt=""></a>							
									</div>
								<?php endforeach;?>
								</div>	
								
								</div>
						</div>
						
						<div class="panel panel-info" id="pan">
								<div class="panel-heading">
									<h3 class="panel-title">Gemstones</h3>
									<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
								</div>
								<div class="panel-body" id="p1">
								<div id="gemb"></div>
								<hr>
								<div id="f2">
								
								<?php 
									$sql3q2=mysqli_query($link,"SELECT * FROM gem");
									 while($row=mysqli_fetch_array($sql3q2)){
									 $gemrs[]=$row;	
									}
								?>
								<?php foreach($gemrs as $gemr): ?>
									<div class="thumbnail transthumb text-center" style="height:auto; width:50px; float:left; margin: 5px 5px 5px 5px;">
										<a id="<?php echo $gemr['id']; ?>" value= "<?php echo $gemr['model_name']; ?>" role="button"><img src="<?php echo $gemr['image_url']; ?>" style="height:50px;"alt=""></a>							
									</div>
								<?php endforeach;?>
								</div>
								</div>
						</div>
					
						<div class="panel panel-info" id="pan">
								<div class="panel-heading">
									<h3 class="panel-title">Center Cut</h3>
									<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
								</div>
								<div class="panel-body" id="p1">
								<div id="f3">
									<?php 
									$sql3q3=mysqli_query($link,"SELECT * FROM centercut");
									 while($row=mysqli_fetch_array($sql3q3)){
									 $cutrs[]=$row;	
									}
								?>
								<?php foreach($cutrs as $cutr): ?>
									<div class="thumbnail transthumb text-center" style="height:auto; width:50px; float:left; margin: 5px 5px 5px 5px;">
										<a id="" value= "<?php echo $cutr['cut_name']; ?>" role="button"><img src="<?php echo $cutr['image_url']; ?>" style="height:50px;"alt=""></a>							
									</div>
								<?php endforeach;?>
								</div>
								</div>
						</div>
					
					</div>
					
				</div>
			</div>
           
        </div>
		
       
        
        

    </div>
    <!-- /.container -->
	<!-- Footer -->
	<footer class="container1">
		<?php include 'template/footer.php';?>		
	</footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/lapi.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/routes.js"></script>
	<script>
	$(document).ready(function () {
            $('#f4 a').parent('.thumbnail').first().addClass("border1");
		/*$('#submitb').on('click',function(){
			var myFormData = new FormData();
			alert(ringimage.files[0]);
			myFormData.append('ringimage', ringimage.files[0]);

			$.ajax({
			  url: 'uploadimage.php',
			  type: 'POST',
			  processData: false, // important
			  contentType: false, // important
			  dataType : 'json',
			  data: myFormData,
			  success:function(data){
					alert(data);
				}
			});*/
			//alert("re");
			/*$.ajax({
				url:'uploadimage.php',
				success:function(data){
					alert(data);
				}
				
			});*/
		
		function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }
                function phonenumber(inputtxt)  
                {  
                  var phoneno = /^\d{10}$/;  
                  if(inputtxt.value.match(phoneno))  
                        {  
                      return true;  
                        }  
                      else  
                        {  
                        //alert("message");  
                        return false;  
                        }  
                }  
		$('#qoutationb').on('click',function(){
			var fullname=$('#fullname').val();
			var email=$('#email').val();
			var phone_n=$('#phone_n').val();
			var ring_s=$('#ring_s option:selected').val();
			var carrot_w=$('#carrot_w option:selected').val();
			var metal=$('#metal').val();
			var gemstone=$('#gemstone').val();
			var centercut=$('#centercut').val();
			var image_url=$('#image img').attr('src');
                        var vendor=$('#vendor_s option:selected').val();
			//alert(image_url);
                        if(fullname===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("empty Full Name");
                            $('#modalq').scrollTop(0);
                           // break;
                        }
                        else if(email==="" || !isEmail(email)){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Incorrect/Empty Email");
                            $('#modalq').scrollTop(0);
                        }
                        else if(phone_n==="" || phone_n.length!=10 || !phonenumber(phone_n)){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Incorrect Phone Number");
                            $('#modalq').scrollTop(0);
                        }
                        
                         else if(image_url==="" || image_url===undefined){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Tick Add Modified One");
                            $('#modalq').scrollTop(0);
                        }
                        else if(vendor=== ""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Select Vendor");
                            $('#modalq').scrollTop(0);
                        }
                        else if(ring_s===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Select Ring Size");
                            $('#modalq').scrollTop(0);
                        }
                        else if(carrot_w===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Select Carrot Size");
                            $('#modalq').scrollTop(0);
                        }
                        else if(metal===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Empty Metal");
                            $('#modalq').scrollTop(0);
                        }
                        else if(gemstone===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Empty Gemstone");
                            $('#modalq').scrollTop(0);
                        }
                        else if(centercut===""){
                            $('#falertdiv').css('display','block');
                            $('#falert').text("Empty Center Cut");
                            $('#modalq').scrollTop(0);
                        }
                      
                        else{
			$.ajax({
                            url:'insertqoutation.php',
                            method:'POST',
                            data:{fullname:fullname,email:email,phone_n:phone_n,ring_s:ring_s,carrot_w:carrot_w,metal:metal,gemstone:gemstone,centercut:centercut,image_url:image_url,vendor:vendor},
                            success:function(data){
                                if(data==="SUCCESS"){
                                    $('#falertdiv').removeClass('alert-danger');
                                    $('#falertdiv').addClass('alert-success');
                                    $('#falertdiv').css('display','block');
                                    $('#falert').text("SuccesFully Sent");
                                    $('#modalq').scrollTop(0);
                                }
                                else if(data==="NOT_SUCCESS"){
                                    $('#falertdiv').addClass('alert-danger');
                                    $('#falertdiv').removeClass('alert-success');
                                    $('#falertdiv').css('display','block');
                                    $('#falert').text("UnsuccesFully Sent");
                                    $('#modalq').scrollTop(0);
                                }
                                else if(data==="NOT_SET"){
                                    $('#falertdiv').addClass('alert-danger');
                                    $('#falertdiv').removeClass('alert-success');
                                    $('#falertdiv').css('display','block');
                                    $('#falert').text("Incorrect data");
                                    $('#modalq').scrollTop(0);
                                }
				//alert(data);
				//$('#image').html(data);
                            }
			});
                        }
		});
                        
	});
	</script>
	<script>
	
	
	$(document).ready(function () {
		var type=1;
		//$('input[type=checkbox]').on("click",check);
                check();
                /*$('').on('click',function(){
                    
                });*/
	function check(){
		//var id=$(this).attr('id');
		//var value=$(this).attr('value');
		//alert(value);
		
		//if($(this).prop("checked")){
			//$('#fileup').find("input, lable, p").attr("disabled",true);
			//alert(vendor);
                    $.ajax({
			url:'ringtype.php',
			method:'POST',
			data:{ringtype:type},
			success:function(data){
                            //alert("done");
                            $('#image').html(data);
			}
                    });
			
		//}
		/*else{
			//$('#fileup').find("input, lable, p").attr("disabled",false);
			$('#image').html('');
		}*/
	}
	$('.panel-heading span.clickable').parents('#pan').find('#p1').slideUp();
	$('.panel-heading span.clickable').addClass('panel-collapsed');
	$('.panel-heading span.clickable').find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
			
	$(document).on('click', '.panel-heading span.clickable', function(e){
		var $this = $(this);
		if(!$this.hasClass('panel-collapsed')) {
			$this.parents('#pan').find('#p1').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		} else {
			$this.parents('#pan').find('#p1').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		}
	});
	
	
    var ringmaterial=[];
    var gemmaterial=[];

    var ring;
    var gems=[];

    var gemselected=0;
    var item="1";
    var meshset=[];
    var meshs=[];
	
    function updateMaterialMenu(matname){
     
       
        
        // default material is Diffuse
        //$('#js-materials_select_menu').append("<option>BASEMATERIAL</option>");
        for(var j =0 ; j < matname.length;j++){
         var mat= matname[j].properties.getParameter('name').value;
          //alert(mat);
            if(mat.includes("ring")){
                ringmaterial.push(mat);
                //alert("done");
            }
            else if(mat.includes("gem")){
              gemmaterial.push(mat);
             //alert(gemmaterial[0]);
            }
        }
        return 0;
       
    }
    function pickringMaterial(m1){
        var mat = "";
     
        mat = m1;
       
     
     
        lapi.applyMaterialToMeshByName(mat,ring);
      
    }

    function pickgemMaterial(g1){
      var mat = "";
      
        mat = g1;
        
      
      
        lapi.applyMaterialToMeshByName(mat,gems[gemselected]);
      
    }
   function dividedmeshes(meshs,vb){
      var str1="edit_";
      var str2=vb;
      var str3=str1.concat(str2);
      meshset=[];
       for (var itr = 0; itr < meshs.length; itr++) {
                // get the name and check for "edit_"
                var mesh = meshs[itr].properties.getParameter('name').value;
                var guidn=meshs[itr].properties.getProperty("Materials").getParameter("tmaterial").value;
                var er=meshs[itr].getProperty("Visibility").parameters.visible;
                //alert(er.value);
                //var displayname=scn.getObjectByGuid(guidn).properties.getParameter('name').value;
                if(mesh.includes(str3)){
                  meshset.push(mesh);
                }
                if(er.value && mesh.includes(str3)){
                  if(mesh.includes("ring")){
                      ring=mesh;
                  }
                  else if(mesh.includes("gem") && mesh.includes(str3)){
                    gems.push(mesh);
                    //alert(mesh);
                  }
                }
              }
              //alert(gems);
   }
   function hide(){
   
    var obj1=lapi.getActiveScene().getObjectByName(ring)[0];
    //alert(obj1.properties.getParameter('name').value);
    obj1.getProperty("Visibility").parameters.visible.value=false;
   
    obj1.getProperty("RenderSettings").parameters.renderVisible.value=false;
    for(var i=0;i<gems.length;i++){
      var obj2=lapi.getActiveScene().getObjectByName(gems[i])[0];
      obj2.getProperty("Visibility").parameters.visible.value=false;
      obj2.getProperty("RenderSettings").parameters.renderVisible.value=false;
    }
    ring="";
    gems=[];
   }
   function unhide(nv,rt){
      var st1="edit_";
      var st2=st1+nv+"_ring";
      var st3=st1+nv+"_gem";
      //alert("unhide"+st2);
       var obj3=lapi.getActiveScene().getObjectByName(st2)[0];
       //alert("fgf");
      obj3.getProperty("Visibility").parameters.visible.value=true;
      obj3.getProperty("RenderSettings").parameters.renderVisible.value=true;
      for(var i=1;i<=parseInt(rt);i++){
        //alert("gem "+i);
        var obj4=lapi.getActiveScene().getObjectByName(st3)[0];
      obj4.getProperty("Visibility").parameters.visible.value=true;
      obj4.getProperty("RenderSettings").parameters.renderVisible.value=true;
      var iN=i.toString();
      st3=st3+"_"+iN;
      }
     // ring=st2;
     // gems.push(st3);
     
       
   }
   function picktype(t1,t2){
    var typeN="";
    var rt;
     
        typeN = t1;
        //write type function
        rt=t2;
     
     item=typeN;
    // alert(typeN+"pick");
     hide();
     unhide(typeN,rt);
     dividedmeshes(meshs,typeN);
     gembutton(gems);

   }
   function gembutton(gemsl){
    $('#gemb').empty();
    for(var j =0 ; j < gemsl.length;j++){
                  
                  //var div = ( document.all ) ? document.all['gem'] : document.getElementById('gem');
                  var btn1=document.createElement('BUTTON');
                  var i1=j.toString();
                  var str="gem"+i1;
                  var txt=document.createTextNode(str);
                  btn1.setAttribute('id',j);
                  btn1.appendChild(txt);
                  $('#gemb').append(btn1);
                 // div.innerHTML='<button>'+ str + '<button>';

                 }
                 btn1.onclick=function(){
                    gemselected=btn1.getAttribute('id');
                    //alert(btn1.getAttribute('id'));
                 }
   }
   function pickgemcut(c1){
    
    cuttype="";
    
        cuttype = c1;
      
    //alert(cuttype);
    var centergem="edit_"+item+"_gem";
    var centergems=centergem+"_square";
    var centergemh=centergem+"_heart";
    
    var w=gems.indexOf(centergem);
    var e=gems.indexOf(centergems);

    var q=gems.indexOf(centergemh);
    
    var tmp=centergem+"_"+cuttype;
    if(cuttype=="oval"){
        tmp=centergem;
    }

    var obj5=lapi.getActiveScene().getObjectByName(tmp)[0];
       //alert("fgf");
      obj5.getProperty("Visibility").parameters.visible.value=true;
      obj5.getProperty("RenderSettings").parameters.renderVisible.value=true;
    if(w>-1){

      var obj6=lapi.getActiveScene().getObjectByName(centergem)[0];
       //alert("fgf");
      obj6.getProperty("Visibility").parameters.visible.value=false;
      obj6.getProperty("RenderSettings").parameters.renderVisible.value=false;
      gems.splice(w,1);
      
      gems.push(tmp);

    }
    else if(e>-1){
      var obj7=lapi.getActiveScene().getObjectByName(centergems)[0];
       //alert("fgf");
      obj7.getProperty("Visibility").parameters.visible.value=false;
      obj7.getProperty("RenderSettings").parameters.renderVisible.value=false;
      gems.splice(e,1);
      
      gems.push(tmp);

    }
    else if(q>-1){
      var obj8=lapi.getActiveScene().getObjectByName(centergemh)[0];
       //alert("fgf");
      obj8.getProperty("Visibility").parameters.visible.value=false;
      obj8.getProperty("RenderSettings").parameters.renderVisible.value=false;
      gems.splice(q,1);
      
      gems.push(tmp);
    }
   }	
	lapi.onSceneLoaded = function() {
         lapi.showToolbar(false);
        var scn = lapi.getActiveScene();
        var mats = scn.getMaterials();
        
        updateMaterialMenu(mats);
        //setupringmaterial(ringmaterial);
        
        //setupgemmaterial(gemmaterial);
        //setupringtype();
        //setupgemcut();
        // Hide the toolbar
      
       //render
         lapi.startRender();
          

        /*
        Add the materials we support editing
         */
        // some constants
        var SENTINEL = 'edit_';
        var r=0;
        // This is our scene object. Think of it as our Scene Graph. It has all the meshes, textures, materials etc.
        //var scn = lapi.getActiveScene();
        //var mats = scn.getMaterials();
        meshs=scn.getMeshes();
        
        // get an array of all the textures loaded in the scene
        
        dividedmeshes(meshs,item);
        gembutton(gems);
	$('#f1 a').on('click',function(){
		var value=$(this).attr('value');
		//alert(value);
		
		$('#metal').val(value.replace("edit_ring_",''));
		pickringMaterial(value);
		$('#f1 a').parent('.thumbnail').removeClass('border1');
		$(this).parent('.thumbnail').addClass('border1');
		
	});
	$('#f2 a').on('click',function(){
		var value=$(this).attr('value');
		var id=$(this).attr('id');
		//alert(value);
		$('#gemstone').val(value.replace("edit_gem_",''));
		pickgemMaterial(value);
                $('#f2 a').parent('.thumbnail').removeClass('border1');
		$(this).parent('.thumbnail').addClass('border1');
		//ajax php code for getting gem details from db
		
		
	});
	
	$('#f3 a').on('click',function(){
		var value=$(this).attr('value');
		//alert(value);
		$('#centercut').val(value);
		pickgemcut(value);
		$('#f3 a').parent('.thumbnail').removeClass('border1');
		$(this).parent('.thumbnail').addClass('border1');
		
	});
	
	$('#f4 a').on('click',function(){
		 var value=$(this).attr('value');
		 type=$(this).attr('id');
		//alert(value);
                check();
		picktype(value,type);
                $('#f4 a').parent('.thumbnail').removeClass('border1');
		$(this).parent('.thumbnail').addClass('border1');
	});
	};

	});
	</script>
</body>

</html>

