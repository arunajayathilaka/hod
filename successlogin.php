<?php
//ob_start();
 require_once 'init.php'; 
 //session_start();
 $_SESSION['N1']=$_SESSION['N2']=$_SESSION['N3']=$_SESSION['N4']=$_SESSION['N5']="";
?>
<html>
<head>
<title>Your account sign in</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="css/index.css">-->
 
 
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" type="text/css" href="css/loginForm.css">
 

 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">	
</head>
<body style="background-color:#FFF6; background-size: 100% 100%;">
	
		
		
	   
            <div class="row" id="authe" style="float:right; height:20px" >
            </div>
			
			
		
	    
		<?php include 'template/headnav.php';?>
		
                <?php include("alert.php"); ?>
    
    <div class="container">
        <div class="row text-center" style="height:300px;">
            <h1>Thank You for Registering with us</h1>
            <h3>An Email will has been sent to the address that you are provided </h3>
        </div>
    </div>
    
    
<!-- Footer -->
	<footer class="container1">
		<?php include 'template/footer.php';?>		
	</footer>
<script src="js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/routes.js"></script>
</body>

</html>