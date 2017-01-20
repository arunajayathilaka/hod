<?php
    require 'init.php';
    require 'session.php';
    $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
    $rescomman = mysqli_query($con,$sqlcomman);
    $rowcomman = mysqli_fetch_assoc($rescomman);
    $output = '';
    $target_path='';
    $target_path4=''; 
    $target_path5=''; 
    $target_path6=''; 
    
    //insert images to imageupload table for slider in the hod page
    
   if(is_array($_FILES)){
       echo is_array($_FILES); 
       $i = 0;
       foreach($_FILES['files']['name'] as $namepic =>$value){
           $file_name = explode(".",$_FILES['files']['name'][$namepic]);
           $allowed_ext = array("jpg","jpeg","png","gif");
           if(in_array($file_name[1],$allowed_ext)){
               $new_name = md5(rand()).'.'.$file_name[1];
               $source_path = $_FILES['files']['tmp_name'][$namepic];
               $target_path = "img/adimages/".$rowcomman['vendor_username'].'/'.$new_name;
               $target_path2="../img/adimages/".$rowcomman['vendor_username'];
               $target_path3="../img/adimages/".$rowcomman['vendor_username'].'/'.$new_name;
               if(!is_dir($target_path2)){
                   mkdir($target_path2);
               }
               if(move_uploaded_file($source_path,$target_path3)){
                   $output .= '<img src = "'.$target_path.'"/>';
               }
           }
           
            $i +=1;   
            if($i===1){
                $target_path4 = $target_path;
            }
            else if($i===2){
                $target_path5 = $target_path;
            }
            else{
                $target_path6 = $target_path;
            }
       }
       
   
   }
   $imgvavailableq = "SELECT * FROM advertisingimage WHERE vendor= '{$rowcomman['vendor_username']}'";
   $imgres = mysqli_query($con,$imgvavailableq);
   $imgcount = mysqli_num_rows($imgres);
   if($imgcount>0){
	$updateimg = "UPDATE advertisingimage SET image1_url='$target_path4' , image2_url='$target_path5'  , image3_url='$target_path6' WHERE vendor= '{$rowcomman['vendor_username']}'";
	$resupdate = mysqli_query($con , $updateimg);
	

   }else{ 
	   $uploadsql = "INSERT INTO advertisingimage(vendor,image1_url,image2_url,image3_url) VALUES('{$rowcomman['vendor_username']}','$target_path4','$target_path5','$target_path6')";
	   $resupload = mysqli_query($con,$uploadsql);
	        
   }
?>

