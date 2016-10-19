<?php
//session_start();
 //require("checklogin.php");
 session_start();
//session_destroy();
 unset($_SESSION['er']);
 unset($_SESSION['username']);
 unset($_SESSION['emailn']);
 header("Location: index.php"); 
 ?>