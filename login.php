<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/fullLogin.css">
	</head>
	<body style="background-image:url(img/bg5.jpg);background-size: 100% 100%;">
	<h1 style="color:white;">invalid password or email</h1>
		<div class="login-block text-center">
			<h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In</h1>
					<p style="padding-left:0px;">Already have an account? Please sign in.</p>
					<form method="post" action="checklogin.php">
						<input type="email" id="eml"name="u" placeholder="Username/Email" required="required"/>
						<input type="password" id="pwd" name="p" placeholder="Password" required="required"/>
						<button id="letmein"type="submit"> Let me in</button>
					</form>
					<p style="padding-left:0px;color:white;"><a style="color:white;">I forgot my password</a></p>
		</div>	
	</body>	
</html>