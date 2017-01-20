
$(document).ready(function () {
    
   /* $("#gallery .thumbnail a").click(deletea);
            
     function deletea(){
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	//alert("gfdh");
	if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type: "POST",
		url: "delete.php",
		data: info,
		success: function(){
		}
            });
            $(this).parents(".col-md-2").animate({ backgroundColor: "#003" }, "slow")
		.animate({ opacity: "hide" }, "slow");
            }
	return false;
     }*/
	$("#form2").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "image_upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend : function(e)
			{
				//$("#preview").fadeOut();
				$("#err").fadeOut();
			},
			success: function(data)
		    {
		    	//alert("done");
				if(data=='invalid')
				{
					// invalid file format.
					$("#err").html("Invalid File !").fadeIn();
				}
				else
				{
					// view uploaded file.
					$("#gallery").append(data).fadeIn();
                                        //$("#gallery .thumbnail a").click(deletea);
					$("#form2")[0].reset();	
				}
		    },
		  	error: function(e) 
	    	{
	    		alert("error");
				$("#err").html(e).fadeIn();
	    	} 	        
	   });
	}));
});

