<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'init.php';


if(isset($_SESSION['username'])){
    $user=$_SESSION['username'];
}
else{
    $user="";
}
if($user===""){
    echo "YES";
}
else{
    echo "NO";
}


?>