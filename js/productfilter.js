var vendor="";
$(document).ready(function(){
	/*function modaldis(){
		$('#productlist h4 a').on('click',function(){
			
		});
	}*/
   //print the doc detail
   function printpro(){
   $('#compareitem .col-md-12 a').on('click',printl);
    //alert("seee");
    //function of print pdf
    function printl(){
        var itemid=$(this).attr('value');
        //alert(itemid);
        var path="http://localhost:1234/hod/print/actionpdf.php?itemid=";
        path=path+itemid;
        //alert(path);
        window.open(path,'_self');
        /*$.ajax({
            url:'print/actionpdf.php?itemid='+itemid,
            method:'GET',
            
            success:function(data){
                //window.open();
                //alert(data);
                //window.open('print/actionpdf.php');
            }
        });*/
    }
   
    }
    printpro();
    //click on product name,display modal
    function pv(){
    $('#productlist .caption a').on('click',productview);
    function productview(){
        //alert("gs");
        var id=$(this).attr('value');
        //alert(id);
        $.ajax({
            url:'productmodalview.php',
            method:'POST',
            data:{itemid:id},
            success:function(data){
            //alert("done");
            //alert(data);
            $('#compareitem').html(data);
            $('#modalhead').text('Item Info');
            $('#modaldialog').removeClass('modal-lg');
            $('#modaldialog').addClass('modal-md');
            $('#myModal').modal('show');
            printpro();
            }
	});
    }
    
    }
	var choice=[];
        //compare two product
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
                                $('#modaldialog').removeClass('modal-md');
                                $('#modaldialog').addClass('modal-lg');
				$('#compareitem').html(data);
                                }
                            });
		  }
		};
		 
		$('input[type=checkbox]').on("click",Checked );
            }
                                
    //change slider in each vendor                       
    function slider(){
        $('.bxslider').bxSlider({
            auto: true
        });
    }
    pro();
    pv();
    
    //change vendor details
    $('#vendorname').on('change',vendordisplay);
    function vendordisplay(){
    //alert("re");
        var selected=$("option:selected",'#vendorname').val();
        var imageName=$("option:selected",'#vendorname').attr('name');
        //alert(selected);
        
        if (selected==="Vendor Name"){
            vendor=null;
            /*$('#lead').addClass("dsplay");
            $('#simg').addClass("dsplay");
            $('#rating').addClass("dsplay");*/
            $('#vpanel').addClass("dsplay");
            //display all products
            $.ajax({
		url:'autoproductlist.php',
		method:'POST',
		data:{},
		success:function(data){
                    //alert("done");
                    $('#productlist').html(data);
                    pro();
                    pv();
                    printpro();
		}
            });
        }
        else{
            /* $('#lead').removeClass("dsplay");
            $('#simg').removeClass("dsplay");
            $('#rating').removeClass("dsplay");*/
            $('#vpanel').removeClass("dsplay");
            slider();
                                            //alert(imageName);
                                            
            $('#shopImage').attr("src", imageName);
            vendor = selected;
            //document.getElementById("lead").innerHTML=vendor;
            //$('#rate').html(<?php echo 'updaterate(id)';?>);
            //alert(vendor);
            //product by vendor
            $.ajax({
                url: 'productlistByv.php',
                method: 'POST',
                data: {shopvendor: vendor},
                success: function (data) {
                    //alert("done");
                    $('#productlist').html(data);
                    pro();
                    pv();
                    printpro();
                }
            });
            //display rating
            $.ajax({
                url: 'ratingdisplay.php',
                method: 'POST',
                data: {shopvendor: vendor},
                success: function (data) {
                    //alert("done");
                    $('#rate').html(data);
                }
            });
            //display detail of vendor
            $.ajax({
                url: 'detaildisplay.php',
                method: 'POST',
                data: {shopvendor: vendor},
                success: function (data1) {
                    //alert(data1);
                    var data = JSON.parse(data1);
                    $('#head').html(data.vendor_name);
                    $('#address').html(data.telephone);
                    $('#contact').html(data.vAddress);
                }
            });
            //display banner
            $.ajax({
                url: 'bannerdisplay.php',
                method: 'POST',
                data: {shopvendor: vendor},
                success: function (data1) {
                    //alert(data1);
                    var data = JSON.parse(data1);
                    $('[id=adimage1]').attr('src', data.image1_url);
                    $('#adimage2').attr('src', data.image2_url);
                    $('[id=adimage3]').attr('src', data.image3_url);
                }
            });
            return false;
        }
    }
    // filter products by type
    $('#type a').on('click', function () {
        var type = $(this).attr('value');
        //document.getElementById("lead").innerHTML=vendor;
        //$('#rate').html(<?php echo 'updaterate(id)';?>);
        //alert(vendor);
        $.ajax({
            url: 'productByt.php',
            method: 'POST',
            data: {shopvendor: vendor, type: type},
            success: function (data) {
                //alert("done");
                $('#productlist').html(data);
                pro();
                pv();
                printpro();
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
               data:{sname:sname,shopvendor:vendor},
               success:function(data){
                   //alert(data);
                   $('#productlist').html(data);
                   pro();
                   pv();
                   printpro();
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
		//alert(vendor);
		var shopvendor=vendor;
		 $.ajax({
                    type : "POST",
                    url : "rating.php",  //change it with your own adress to the code
                    data: {rate:therate, shopvendor:shopvendor},
                    success:function(data){
                        //alert(data);
                        if(data!="NOT_SET_SESSION"){
                            $('#rate').html(data);
                        }
                        else{
                            $('#loginalert').modal('show');
                        }
                        
			//alert("done");
                    }
            });
	});
                                
     var vendorName=sessionStorage.getItem('vendorName');
          //alert(vendorName);
            if(vendorName!=""){
                var str="#vendorname option[value="+vendorName+"]";
                $(str).attr('selected','selected');
                vendordisplay();
            }
            sessionStorage.removeItem(vendorName);
});