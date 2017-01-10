<?php
    require 'session.php';
    require 'init.php';
  
    $img_src = "";
    $name=$pass=$add=$imgchanege=$em=$tel="";
    $nameerror=$passerror=$adderror=$imgchanege=$emerror=$telerror="";

    $sql = "SELECT image_url FROM vendor WHERE vendor_email =  '{$_SESSION['login_user']}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    if ($row['image_url']) {
        $img_src = $row['image_url'];
    }
    
    function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
if(isset($_POST['submit'])){
	
	if(isset($_POST['cName'])&& ($_POST['cName']!=null) ){
		$namec = test_input($_POST['cName']);
                if(preg_match("/^[a-zA-Z ]*$/",$namec)){
                    $name=$namec;
                    //echo $name;
                    //$sql = "UPDATE vendor SET vendor_name ='$name' WHERE  vendor_email =  '{$_SESSION['login_user']}'";
                   // mysql_query($sql);
                }else{
                    $nameerror = "characters and white spaces only accept";
                }
		
	}
       if(isset($_POST['confirmpassword'])&& isset($_POST['currentpassword'])&&isset($_POST['newpassword'])){
		if(($_POST['confirmpassword']!=null)&&($_POST['currentpassword']!=null)&&($_POST['newpassword']!=null) ){
			$curr = mysqli_query($con,"SELECT vendor_password FROM vendor WHERE  	vendor_email = '{$_SESSION['login_user']}'"); 
			if(($_POST['currentpassword'])== mysqli_fetch_array($curr)["vendor_password"]){
				$passc = $_POST['confirmpassword'];
                                if($passc==$_POST['newpassword']){
                                    $pass = $passc;
                                    echo $pass;
                                    //$sql = "UPDATE vendor SET vendor_password ='$pass' WHERE  vendor_email = '{$_SESSION['login_user']}' ";
                                    //mysql_query($sql);
                                }else{
                                    $passerror = "Password and confirm password is not same";
                                }
				
                        }else{
                            $passerror = "This is not current password";
                        }
                }
		
	}
        if(isset($_POST['address'])&& ($_POST['address']!=null) ){
            
		$add = $_POST['address'];
                //echo $add;
                
		//$sql = "UPDATE vendor SET  vAddress ='$add' WHERE  vendor_email = '{$_SESSION['login_user']}' ";
		//mysql_query($sql);
	}
        if(isset($_POST['email'])&& ($_POST['email']!=null) ){
		$emc = $_POST['email'];
                if(filter_var($emc, FILTER_VALIDATE_EMAIL)){
                    $em =$emc;
                    echo $em;
                    //$sql = "UPDATE vendor SET vendor_email ='$em' WHERE  vendor_email = '{$_SESSION['login_user']}' ";
                    //mysql_query($sql);
                   
                }else{
                    $emerror = "please enter a valid email";
                }
		
	}
        if(isset($_POST['contact'])&& ($_POST['contact']!=null) ){
		$telc = $_POST['contact'];
		if(strlen($telc)==11 ||strlen($telc)==9){
                        $tel = $telc;
                        //echo $tel;
			//$sql = "UPDATE vendor SET  telephone ='$tel' WHERE  vendor_email = '{$_SESSION['login_user']}' ";
			//mysql_query($sql);
                }else{
                    $telerror = "Please enter a valid number";
                }
		
	}
        if(isset($_FILES['ima']['name'])){
         //$filetmp = $_FILES['file']['tmp_name'];
        // $filename =$_FILES['file']['name'];
        // $filepath = "img/vendor images/".$_FILES['file']['name'];
         move_uploaded_file($_FILES['ima']['tmp_name'], "img/vendor images/".$_FILES['ima']['name']);
         $imgchanege = "img/vendor images/{$_FILES['ima']['name']}";
         echo "im".$_FILES['ima']['name']."</br>";
         //$sqll = "UPDATE vendor SET image_url= 'img/vendor images/{$_FILES['image']['name']}' WHERE  vendor_email='{$_SESSION['login_user']}'";
         //mysql_query($sqll);
    }
    
    
    if( $name!="" && $add!="" && $em != "" && $tel!="" &&$imgchanege!=""){
        echo $em;
        $ql1 =  "UPDATE vendor SET vendor_name ='$name' ,vAddress = '$add',vendor_email= '$em',telephone='$tel',image_url='$imgchanege' WHERE  vendor_email = '{$_SESSION['login_user']}'";
        mysqli_query($con,$ql1);
        $_SESSION['login_user']=$em;   
    }
    if($pass!=""&&  $name!="" && $add!="" && $em != "" && $tel!="" &&$imgchanege!=""){
        $ql2 =  "UPDATE vendor SET vendor_name ='$name',vendor_password=$pass,vAddress = '$add',vendor_email= '$em',telephone='$tel',image_url='$imgchanege' WHERE  vendor_email = '{$_SESSION['login_user']}'";
         mysqli_query($con,$ql2);
        $_SESSION['login_user']=$em;
    }
       
}

?>