<?php
    require 'init.php';
    if(isset($_POST['read'])){
          $sqlread = "SELECT * FROM quotation WHERE id={$_POST['read']}";
          $resultread = mysqli_query($con,$sqlread);
          $rowread = mysqli_fetch_array($resultread, MYSQLI_ASSOC);
          
           
           
            $readmo='<div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <span class="glyphicon glyphicon-envelope"></span>
                         <h4>Qutation for '.$rowread['full_name'].'</h4>
                     </div>
                     <div class="modal-body">
                         <form class="form-horizontal" method="post" enctype="multipart/form-data" >
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Juwelery name</label>
                                 <div class="col-sm-7">
                                     <input class="form-control" type="text" value="'.$rowread['full_name'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Juwelery Type</label>
                                 <div class="col-sm-7">
                                     <input class="form-control" type="text" value="'.$rowread['item_type'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Metal</label>
                                 <div class="col-sm-7">
                                     <input class="form-control" type="text" value="'.$rowread['metal'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Carrot</label>
                                 <div class="col-sm-7">
                                     <input class="form-control"  type="text" value="'.$rowread['carrot_w'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Gemstone Type</label>
                                 <div class="col-sm-7">
                                     <input class="form-control"  type="text" value="'.$rowread['gemstone'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Center cut</label>
                                 <div class="col-sm-7">
                                     <input class="form-control"  type="text" value="'.$rowread['center_cut'].'"/>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-3 control-label">Mobile</label>
                                 <div class="col-sm-7">
                                     <input class="form-control"  type="text" value="'.$rowread['mobile_num'].'"/>
                                 </div>
                             </div>
                             <div>
                                 <label class="col-sm-3" >Design image</label>
                                 <div><img src="'.$rowread['image_url'].'" height="200" id="itemimage"  alt="Image preview..."></div>
                             </div>

                             <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                         </form>

                     </div>';

                         
           $readmodel = "{$readmo}";
           echo $readmodel; 
                  
    }
?>