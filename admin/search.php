<?php
       require_once 'database.php';
                if(isset($_GET['search'])){

                    $sname=$_GET['search'];
                }
                else{
                    $sname=" ";
                }
               // $sname=preg_replace("#[^0-9a-z]#i","",$sname);
               
       $articleQuery=mysqli_query($conn,"SELECT item_id,product_name,product_type,product_dec,product_price,image_url,vendor_username FROM product_items WHERE product_items.vendor_username= '{$sname}'");
 
    while($row=mysqli_fetch_array($articleQuery)){
		  $articless[]=$row;
	   }
        if(@count($articless) != 0 ){
		
		foreach($articless as $article){
			
			$ser= '<div class="col-sm-4 col-lg-3 col-md-4" style="margin-right:-10px">
                    <div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb; margin-right:3px">
								
				                <div class="caption">
                                    <img src="'.$article['image_url'].'" style="height:75px;" alt="">
                                    <p>Product id = '.$article['item_id'].'</p>
									<h4><a style="color:darkblue;"href="#">'.$article['product_name'].'</a>
									</h4>
                                    <center>
                                    <div class="row">
                                    <a value="edit" class="btn btn-default btn-sm active" role="button" data-toggle="modal" data-target="#editj"><img class="img1" src="./img/edit.png" alt="" style="width:35px; height:35px"></a>
                                    </div>
                                    <input class="chk" type="checkbox"  name="item_id[]" value="<?php echo '.$article['item_id'].';?>"  style="float:left;"/>
                                    </center>
                                    
                                    
								</div>
							</div>
                            </div>';
            $qw="{$ser}";
			echo $qw;
        }
        }
    else{
            echo '<p>not found</p>';
	   }




?>