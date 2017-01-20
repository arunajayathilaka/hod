<?php
    require 'init.php';
    $comapany=$email=$add=$tele=$user=$pass="";
    
    //echo 'we are';
    $companyerror=$telerror=$usererror="";
    function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
    if(isset($_POST['register'])){
        if(isset($_POST['company']) && isset($_POST['emailregister']) && isset($_POST['add'])){
            $comapany = test_input($_POST['company']);
            $email=test_input($_POST['emailregister']);
            $add=test_input($_POST['add']);
        }
        
        if(isset($_POST['tele'])  ){
            if(preg_match("/^[0-9]{10}$/", $_POST['tele'])){
                $tele = test_input($_POST['tele']);
            }else{
                $telerror = "Please Enter a Valid Contact Number";
            }
        }
        if(isset($_POST['user'])){
           
             $user = test_input($_POST['user']);
           
        }
        if(isset($_POST['passregister'])){
            if($_POST['passregister']==$_POST['confirmpass']){
                $pass = test_input($_POST['passregister']);
            }
            
        }
        //echo $comapany.' '.$email.' '.$add.' '.$tele.' '.$user.' '.$pass;
        if($comapany!=="" && $email!=="" && $add !== "" && $tele!== "" && $user!== "" && $pass!== ""){
            //echo 'done';
            $tempuserquery = "INSERT INTO temp_vendor(vendor_username,vendor_name,vendor_email,vendor_password,image_url,telephone,vAddress) VALUES('$user','$comapany','$email','$pass','img/als-images/vendor.png','$tele','$add')";
            $tempuserresult = mysqli_query($con, $tempuserquery);
            header("Location: ../successlogin.php");
        }
        else{
           // echo 'undone';
        }
    }
?>
