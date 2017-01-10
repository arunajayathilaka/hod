<?php
    //select details form dolist table
    require 'init.php';
    if(isset($_POST['dol'])){
        $sqldo = "INSERT INTO dolist(task) VALUES('{$_POST['dol']}')";
        
        echo mysqli_query($con,$sqldo);
    }
    //delete dolist details from dolist table
    if(isset($_POST['inputdo'])){
        $sqldodel = "DELETE FROM dolist WHERE doID = {$_POST['inputdo']}";
        mysqli_query($con,$sqldodel);
    }
?>