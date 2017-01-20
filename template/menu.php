<?php
        require_once 'init.php';
        //session_start();
        $row2=array("null");
	if(isset($_SESSION['username'])){
            $user=$_SESSION['username'];
        //$$link=new mysqli("localhost","root","","houseofdiamante");
            
	$query=mysqli_query($link,"SELECT pro_pic FROM customerlogin WHERE username='{$_SESSION['username']}'");
	while($row1=mysqli_fetch_array($query)){
		$row2=$row1['pro_pic'];
	}
	}
	if($_SESSION['er1']=="false"){
		echo '
		<div class="row" id="authe" style="float:right;height:20px;" >
    			<a href="account-sign-in-up.php" style="text-decoration: none !important; cursor:pointer; margin-right:10px;color:#3D3D3D;" id="signin"><span class="glyphicon glyphicon-user"></span> Sign Up</a>

    			<a href="account-sign-in-up.php" style="text-decoration: none !important; cursor:pointer; margin-right:20px;color:#3D3D3D;" id="login"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
	    </div>';
		
	}
	else{
		echo '
		<div class="row" id="authe" style="float:right;height:20px;" >
    			
    			<a href="profile4.php" style="background-color=none;text-decoration: none !important; cursor:pointer;margin-right:10px;color:#3D3D3D;"><span> <img src="'.$row2.'" class="media-object img-circle pull-left" style="margin-right:4px; width:30px; height:30px;"><span>My Account</a>
				<a href="logout.php" src="#" style="text-decoration: none !important; cursor:pointer; margin-right:10px;color:#3D3D3D;" id="signin" ><span class="glyphicon glyphicon-user"></span> Log Out</a>

		</div>';
		
		
		
	}

?>		