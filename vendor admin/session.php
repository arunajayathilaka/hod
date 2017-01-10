<?php
   
   include('init.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select  vendor_email from vendor where vendor_email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['vendor_email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
