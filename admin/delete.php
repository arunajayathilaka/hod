<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<script>
    $(document).ready(function(){
                    $('#del').click(function(){
                        if(confirm("Are you sure you want to delete these items")){
                            var id =[];
                            $(':checkbox:checked').each(function(i){
                                id[i]= $(this).val();
                            });
                            
                            if(id.length === 0){    
                            }else{   
                                $.ajax({
                                    url:'ProductDetails.php',
                                    method:'POST',
                                    data:{id:id},
                                    success:function(){
                                        for(var i=0; i<id.length ;i++){
                                            $('div#'+id[i]+'').fadeOut('slow');
                                        }
                                    }
                                });
                            }
                        }else{
                            return false;
                        }
                    });
                });

</script>

<div class="col-lg-3 hidden-xs" >
     <button  class="btn btn-lg btn-primary  glyphicon glyphicon-refresh" id="juwel" ></button>
     <button class="btn btn-lg btn-primary glyphicon glyphicon-plus"data-toggle="modal" data-target="#add" ></button>
     <button class="btn btn-lg btn-primary glyphicon glyphicon-trash " name="del" id="del" ></button>
</div>
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>