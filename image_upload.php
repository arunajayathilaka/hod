<?php

require_once 'init.php';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = 'img/photohub images/'.$_SESSION['username']; // upload directory

if(is_dir($path)==false){
    mkdir($path);
}
$path=$path.'/';
if(isset($_FILES['image2']))
{
	$img = $_FILES['image2']['name'];
	$tmp = $_FILES['image2']['tmp_name'];
	if (isset($_POST['img_desc'])) {
		$desc = $_POST['img_desc'];
	}
		
	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
	
	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;
	
	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	
			
		if(move_uploaded_file($tmp,$path)) 
		{
			/*$quer_upload = "update customerlogin set pro_pic = '$path' where email='{$_SESSION['emailn']}'";
			if($upload_run = mysqli_query($link,$quer_upload)){
				echo "<img src='$path' />";
				//echo $upload_run;
				
			}*/
			$quer_upload = "insert into articles(title_name,username,image_url) values('$desc','{$_SESSION['username']}','$path')";
			if ($run = mysqli_query($link,$quer_upload)) {
				//echo "done";
                            $query_gal = "select * from articles where username = '{$_SESSION['username']}' AND image_url='{$path}'";
                            $query_gal_run = mysqli_query($link,$query_gal);

                            while ($gal = mysqli_fetch_assoc($query_gal_run)) {
                                //$image_title = $gal['title_name'];
                                //$gal_image = $gal['image_url'];
                                $gal_id = $gal['id'];
                            }
				echo '
				<div class="col-md-2" style="height:200px; width:150px;">
				<div class="thumbnail" style="height:180px; width:150px;">
					        <a href="" target="_blank">
					          <img src="'.$path.'" alt="Lights" style="width:100%;height:100px;">
					          <div class="caption">
					            <p>'.$desc.'</p>
					          </div>
                                                  <a  id="'.$gal_id.'"><span class="glyphicon glyphicon-trash"></span></a>
										      
					        </a>
					      </div></div>
					   ';
				//echo "<img src='$path' style='height:20px;width:20px;' />";
			}else{
				echo "fail";
			}
			
		}
	} 
	else 
	{
		echo 'invalid';
	}
}else{
	echo "done2";
}


?>