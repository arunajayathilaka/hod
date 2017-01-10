var vendor;
$(document).ready(function(){
	/*function modaldis(){
		$('#productlist h4 a').on('click',function(){
			
		});
	}*/
	var choice=[];
	function pro(){
		var Checked = function() {
			//alert('rer');
		  var n = $( "input:checked" ).length;
		  var val1=$( "input:checked:last" ).val();
		  var val2=$( "input:checked:first" ).val();
		  //alert(val1+""+val2);
		  
		  if(n==2){
			  choice.push(val1);
			  choice.push(val2);
			  //val="";
			  //alert(val);
			  comparenow.disabled=false;
			  $( "input[type='checkbox']" ).prop({disabled: true});
			  $.ajax({
						url:'compareitems.php',
						method:'POST',
						data:{item1:choice[0],item2:choice[1]},
						success:function(data){
							//alert("done");
							choice=[];
							$('#compareitem').html(data);
						}
					});
		  }
		};
		 
		$('input[type=checkbox]').on("click",Checked );
            }
                                
                                
                                function slider(){
                                     $('.bxslider').bxSlider({
                                         auto: true
                                    });
                                }
				pro();
				 $('#vendorname').on('change',function(){
					//alert("re");
                                        var selected=$("option:selected",this).val();
                                       alert(selected);
                                        if (selected==="Vendor Name"){
                                            /*$('#lead').addClass("dsplay");
                                            $('#simg').addClass("dsplay");
                                            $('#rating').addClass("dsplay");*/
                                            $('#vpanel').addClass("dsplay");
                                            $.ajax({
						url:'autoproductlist.php',
						method:'POST',
						data:{},
						success:function(data){
							//alert("done");
							$('#productlist').html(data);
							pro();
						}
					});
                                        }
                                        else{
                                           /* $('#lead').removeClass("dsplay");
                                            $('#simg').removeClass("dsplay");
                                            $('#rating').removeClass("dsplay");*/
                                            $('#vpanel').removeClass("dsplay");
                                            slider();
					vendor=selected;
					//document.getElementById("lead").innerHTML=vendor;
					//$('#rate').html(<?php echo 'updaterate(id)';?>);
					//alert(vendor);
					$.ajax({
						url:'productlistByv.php',
						method:'POST',
						data:{shopvendor:vendor},
						success:function(data){
							//alert("done");
							$('#productlist').html(data);
							pro();
						}
					});
					$.ajax({
						url:'ratingdisplay.php',
						method:'POST',
						data:{shopvendor:vendor},
						success:function(data){
							//alert("done");
							$('#rate').html(data);
						}
					});
                                        $.ajax({
						url:'detaildisplay.php',
						method:'POST',
						data:{shopvendor:vendor},
						success:function(data1){
							//alert(data1);
                                                        var data = JSON.parse(data1);
							$('#head').html(data.vendor_name);
                                                        $('#address').html(data.telephone);
                                                        $('#contact').html(data.vAddress);
						}
					});
					
					return false;
                                    }});
				$('#type a').on('click',function(){
					var type=$(this).attr('value');
					//document.getElementById("lead").innerHTML=vendor;
					//$('#rate').html(<?php echo 'updaterate(id)';?>);
					//alert(vendor);
					$.ajax({
						url:'productByt.php',
						method:'POST',
						data:{shopvendor:vendor,type:type},
						success:function(data){
							//alert("done");
							$('#productlist').html(data);
							pro();
						}
					});
					
					
					return false;
					});
					
     
    
    //serach                                   
     $('#pgo').on('click',function(){
           var sname=$('#psearch').val();
           
           $.ajax({
               url:'searchproduct.php',
               method:'POST',
               data:{sname:sname},
               success:function(data){
                   
                   $('#productlist').html(data);
                   pro();
               }
           });
        });
	//ratings
	
	$('.rate-btn').hover(function(){
					$('.icon').removeClass('icon1');
					var therate = $(this).attr('id');
					
					for (var i = therate; i >= 0; i--) {
						$('.rate-btn-'+i).addClass('icon1');
					};
				},function(){
					$('.icon').removeClass('icon1').addClass('icon');
				});
				
				$('.rate-btn').on('click',function(){    
					var therate = $(this).attr('id');
					alert(vendor);
					var shopvendor=vendor;
					 $.ajax({
						type : "POST",
						url : "rating.php",  //change it with your own adress to the code
						data: {rate:therate, shopvendor:shopvendor},
						success:function(data){
							$('#rate').html(data);
							alert("done");
						}
					});
				});
});