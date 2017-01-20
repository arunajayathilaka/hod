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
			
			$ser= '<div class="col-sm-4 col-lg-3 col-md-4" style="margin-right:-17px">
                    <div class="thumbnail" style="background-color: rgba(230,238,255,0.5); width:220px; height:240px; border: 2px solid #218dfb; margin-right:3px">
								
				                <div class="caption">
                                    <img src="../'.$article['image_url'].'" style="height:75px;" alt="">
                                    <div class="row" style="height:70px;">
                                    <p>&nbspPrice(Rs.) ='.$article['product_price'].'</p>
									<h4 style="color:darkblue;"href="#">&nbsp'.$article['product_name'].'</h4></div><br><br>
                                   
                                  <div class="row">
                                    <div class="col-lg-8">
                                            <input class="chk" type="checkbox"  name="item_id[]" value="'.$article["item_id"].'" style="float:left;"/>
                                        </div>
                                    <div class="col-lg-4" align="right">
                                    <button value="editj"class="btn btn-primary" type="button" data-toggle="modal" data-target="#editj'.$article['item_id'].'">Edit</button>
                                    </div>
                                    </div>
                                   
                                    
                                    </div>
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