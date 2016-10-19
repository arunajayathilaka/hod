<?php
//ob_start();

?>
<html>
<head>
<title>Your account sign in</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="css/index.css">-->
 
 
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" type="text/css" href="css/loginForm.css">
 
 <link rel="stylesheet" type="text/css" href="css/home1.css">
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body style="background-image:url(img/bg5.jpg);background-size: 100% 100%;">
	
		
		
	   
			<div class="row" id="authe" style="float:right; height:20px" >
    			<a src="#" style="text-decoration: none !important; cursor:pointer; margin-right:10px;" id="signin"><span class="glyphicon glyphicon-user"></span> Sign In</a>

    			<a src="#" style="text-decoration: none !important; cursor:pointer;margin-right:20px;" id="login"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
	    	</div>
			
			
		
	    
			<?php include 'template/headnav.php';?>
		
	   
	
	
			
		
		<div class="row" style="background-color: rgba(230,238,255,0.5); height:auto;">
			<div class="col-md-6 text-center" style=" height:auto; ">
				<div class="login-block text-center" >
					<h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In</h1>
					<p style="padding-left:0px;">Already have an account? Please sign in.</p>
                                        
					<form method="post" action="checklogin.php">
						<input type="email" id="eml"name="u" placeholder="Username/Email" required="required"/>
						<input type="password" id="pwd" name="p" placeholder="Password" required="required"/>
						<button id="letmein"type="submit"> Let me in</button>
					</form>
                                        
					<p style="padding-left:0px;color:white;"><a style="color:white;">I forgot my password</a></p>
				</div>
			</div>
			<div class="col-md-6 text-center" style=" height:auto;border-left: 2px solid #333;">
				<div class="login-block text-center" >
				
					<h1><span><img src="img/signup.png" style="width:15%;"/></span>Create Account</h1>
					<p style="padding-left:0px;">set up your account</p>
					<form method="post" action="register.php">
				<input type="text" name="u" placeholder="Username" required="required" id="u" />
				<div id="message2" style="text-align:left;">
				
				</div>
				<input type="email" name="e" placeholder="email" required="required"/>
				<input type="password" name="p" placeholder="password" required="required" id="p"/>
				<input type="password" name="cp" placeholder="Comfirm Password" required="required" id="cp"/>
				
				<div id="message" style="text-align:left;">
				
				</div>
				<p style="padding-left:0px;">By creating an account, you agree to Blue Nile's Terms and conditions and Privacy Policy</p>
				<button id="takemein" type="submit" > Take me in</button>
			</form>
					
				</div>
			</div>
		</div>
		
				
	
    <footer class="container1">
		<?php include 'template/footer.php';?>	
	</footer>

<script src="js/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/signinup.js"></script>



</body>
</html>
