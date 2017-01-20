/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
   $('#bs-example-navbar-collapse-1 ul li a').on('click',function(){
       var ref=$(this).attr('value');
       //alert(ref);
       if(ref==="photohub.php" || ref==="design.php"){
           $.ajax({
		url:'usersessioncheck.php',
		method:'GET',
		success:function(data){
			//alert(data);
                        if(data==="YES"){
                            //alert("erw");
                           $('#loginalert').modal('show'); 
                        }
                        else if(data==="NO"){
                            window.location.href =ref;
                            
                        }
							
			}
		});
       }else{
       
       window.location.href =ref;
   }
   }); 
   
   
});