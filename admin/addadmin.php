<?php 
include('database.php');
            //$aid=$_POST["aid"];
            $aname=$_POST["aname"];
            $amail=$_POST["amail"];
            $atel=$_POST["atel"];
            $auname=$_POST["auname"];
            $apass=$_POST["apass"];
                                   
    
$msg='';    
$query="INSERT INTO admin(admin_name,admin_email,telephone,username,Password) 
values('$aname','$amail','$atel','$auname','$apass')";

$result = $conn->query($query);
	if($result === TRUE){
		echo 'Record has Successfully been Inserted';
    }                    
                            
                            
?>   