<?php
    require 'init.php';
    require 'session.php';
    $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
    $rescomman = mysqli_query($con,$sqlcomman);
    $rowcomman = mysqli_fetch_array($rescomman, MYSQL_ASSOC);
    $output = '';
    $target_path1=''; 
    $target_path2=''; 
    $target_path3=''; 
    
    //insert images to imageupload table for slider in the hod page
    
   if(is_array($_FILES)){
       $i = 0;
       foreach($_FILES['files']['name'] as $namepic =>$value){
           $file_name = explode(".",$_FILES['files']['name'][$namepic]);
           $allowed_ext = array("jpg","jpeg","png","gif");
           if(in_array($file_name[1],$allowed_ext)){
               $new_name = md5(rand()).'.'.$file_name[1];
               $source_path = $_FILES['files']['tmp_name'][$namepic];
               $target_path = "upload/".$new_name;
               if(move_uploaded_file($source_path,$target_path)){
                   $output .= '<img src = "'.$target_path.'"/>';
               }
           }
           
            $i +=1;   
            if($i===1){
                $target_path1 = $target_path;
            }
            else if($i===2){
                $target_path2 = $target_path;
            }
            else{
                $target_path3 = $target_path;
            }
       }
       
   
   }
   $uploadsql = "INSERT INTO imageupload(vendername,img1,img2,img3) VALUES('{$rowcomman['vendor_name']}','$target_path1','$target_path2','$target_path3')";
   $resupload = mysqli_query($con,$uploadsql);        
?>
