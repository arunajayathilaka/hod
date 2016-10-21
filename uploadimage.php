<?php

	require_once'init.php';
	$query=mysqli_query($link,"SELECT MAX(id) AS lastid FROM quotation");
	
	$row1=mysqli_fetch_array($query);
		
	$id=$row1['lastid']+1;
	if(isset($_FILES['ringimage'])){
		if($_FILES['ringimage']['size']<20000000){
			$path="img/upload/qoutation/";
			$path.=$_SESSION['username'];
			$file_name=$_FILES['ringimage']['name'];
			$file_ext = substr($file_name, strripos($file_name, '.'));
			$newfile_name=$_SESSION['username']."_".$id;
			$newfile_name.=$file_ext;
			//rename($file_name.$newfile_name);
			if (!file_exists($path)) {
				mkdir($path,0777, true);
			} 
			
			if(move_uploaded_file($_FILES['ringimage']['tmp_name'],$path."/".$newfile_name)){
				//echo 'success';
				?>
				<script type="text/javascript">
					parent.document.getElementById("image").innerHTML="<img style='height:100px; width:100px;'src='\<?php echo $path."/".$newfile_name;?>\'>";
				</script>
				<?php
			}
			else{
				//echo 'not successs';
				?>
				<script type="text/javascript">
					parent.document.getElementById("image").innerHTML="<p>not success</p>";
				</script>
				<?php
			}
		}
		else{
			//echo 'not big';
			?>
				<script type="text/javascript">
					parent.document.getElementById("image").innerHTML="<p>too large</p>";
				</script>
				<?php
		}
		
	}
	else{
		//echo 'not set';
		?>
				<script type="text/javascript">
					parent.document.getElementById("image").innerHTML="<p>error occur</p>";
				</script>
				<?php
	}


?>