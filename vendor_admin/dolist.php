<?php
    //select details form dolist table
    require 'init.php';
    $ven="";
    if(isset($_POST['dol'])){
        $ven = $_POST['ven'];
        $sqldo = "INSERT INTO dolist(task,vendor) VALUES('{$_POST['dol']}','$ven')";
        
        echo mysqli_query($con,$sqldo);
    }
    //delete dolist details from dolist table
    if(isset($_POST['inputdo'])){
        $ven = $_POST['ven'];
        $sqldodel = "DELETE FROM dolist WHERE doID = {$_POST['inputdo']} AND vendor='$ven'";
        mysqli_query($con,$sqldodel);
    }
?>