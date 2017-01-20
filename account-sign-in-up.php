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
	
    <div class="row">
        <div id="btng1" class="btn-group btn-group-justified" role="group" style="margin-bottom:10px;margin-top:10px;width:50%;margin-left: 25%;"aria-label="...">
            <div class="btn-group" role="group">
              <button value="c" type="button" class="btn btn-default  active">Customer</button>
            </div>
           
            <div class="btn-group" role="group">
                <button value="v" type="button" class="btn btn-default">Vendor</button>
            </div>
        </div>
    </div>
			
		
		<div id="content" class="row" style="background-color: rgba(230,238,255,0.5); height:auto;">
			<div class="col-md-6 text-center" style=" height:auto; ">
                            
				<div class="login-block text-center" >
                                    <h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In<h3>As Customer</h3></h1>
					<p style="padding-left:0px;">Already have an account? Please sign in.</p>
                                        
					<form>
						<input type="email" id="eml"name="u" placeholder="Username/Email" required="required"/>
						<input type="password" id="pwd" name="p" placeholder="Password" required="required"/>
						<button class="btn btn-default" id="letmein" type="" > Sign in</button>
					</form>
                                        
					<p style="padding-left:0px;color:white;text-decoration: none; cursor:pointer;"><a href="forgot_pass.php" style="color:black;">I forgot my password</a></p>
				</div>
                                 <div id="f1alertdiv"class="alert alert-danger" style="display:none; margin-left: 10px;margin-right: 10px; margin: auto; width: 55%;" role="alert"><p id="f1alert"></p></div>
                                                   
			</div>
			<div class="col-md-6 text-center" style=" height:auto;border-left: 2px solid #333;">
				<div class="login-block text-center" >
				
					<h1><span><img src="img/signup.png" style="width:15%;"/></span>Create Account<h3>As Customer</h3></h1>
					<p style="padding-left:0px;">set up your account</p>
			<form method="post" action="confirmation.php">
				<input type="text" name="u" placeholder="Username" required="required" id="u" />
				<div id="message2" style="text-align:left;">
				
				</div>
				<input type="email" name="e" placeholder="email" required="required"/>
				<input type="password" name="p" placeholder="password" required="required" id="p"/>
				<input type="password" name="cp" placeholder="Comfirm Password" required="required" id="cp"/>
				
				<div id="message" style="text-align:left;">
				
				</div>
				<p style="padding-left:0px;">By creating an account, you agree to House of Diamante's Terms and conditions and Privacy Policy</p>
				<button class="btn btn-default" id="takemein" type="submit" > Sign up</button>
			</form>
					
				</div>
			</div>
		</div>
		
                <div id="content2" class="row" style="display:none; background-color: rgba(230,238,255,0.5); height:auto;">
			<div class="col-md-6 text-center" style=" height:auto; ">
                            
				<div class="login-block text-center" >
					<h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In<h3>As Vendor</h3></h1>
					<p style="padding-left:0px;">Already have an account? Please sign in.</p>
                                        
					<form>
						<input type="email" id="eml2"name="u" placeholder="Username/Email" required="required"/>
						<input type="password" id="pwd2" name="p" placeholder="Password" required="required"/>
						<button class="btn btn-default" id="letmein2" type="" > Sign in</button>
					</form>
                                        
					<p style="padding-left:0px;color:white;text-decoration: none; cursor:pointer;"><a style="color:black;">I forgot my password</a></p>
				</div>
                                 <div id="valert"class="alert alert-danger" style="display:none; margin-left: 10px;margin-right: 10px; margin: auto; width: 55%;" role="alert"><p id="valert1"></p></div>
                                                   
			</div>
			<div class="col-md-6 text-center" style=" height:auto;border-left: 2px solid #333;">
				<div class="login-block text-center" >
				
					<h1><span><img src="img/signup.png" style="width:15%;"/></span>Create Account<h3>As Vendor</h3></h1>
					<p style="padding-left:0px;">set up your account</p>
			<form method="post" action="vendor_admin/registervendor.php">
				<input type="text" name="user" placeholder="Username" required="required" id="u2" />
				<div id="message22" style="text-align:left;">
				
				</div>
                                <input type="text" name="company" placeholder="Company Name" required="required"/>
                                <input type="email" name="emailregister" placeholder="Email" required="required"/>
                                <input type="text" name="add" placeholder="Address" required="required"/>
                                
				<input type="text" name="tele" placeholder="Contact Number" required="required"/>
				<input type="password" name="passregister" placeholder="password" required="required" id="p2"/>
				<input type="password" name="confirmpass" placeholder="Comfirm Password" required="required" id="cp2"/>
				
				<div id="message3" style="text-align:left;">
				
				</div>
				<p style="padding-left:0px;">By creating an account, you agree to House of Diamante's Terms and conditions and Privacy Policy</p>
				<button class="btn btn-default" name="register" id="takemein2" type="submit" > Sign up</button>
                                 <div id="validatediv"class="alert alert-danger" style="display:none; margin-left: 10px;margin-right: 10px; margin: auto; width: 55%;" role="alert"><p id="f1alert"></p></div>
                                   
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
<script src="js/routes.js"></script>

<script>
    $(document).ready(function(){
        //alert("ff");
        $('#cp2').on('keyup', function () {
            if ($(this).val() == $('#p2').val()) {
                        document.getElementById('takemein2').disabled=false;
                $('#message3').html('matching').css('color', 'green');


            } 
                else {
                        document.getElementById('takemein2').disabled=true;
                        $('#message3').html('not matching re enter the password').css('color', 'red');


                }
        });
        $('#u2').on('keyup', function () {
            var uname=$('#u2').val();
            //alert(uname);
            $.ajax({
                                    url:'vendoravailable.php',
                                    method:'POST',
                                    data:{usern: uname},
                                    success:function(data){
                                            //alert(data);
                                            $('#message22').html(data);
                                    }
                            });
            });
        $('#btng1 .btn-group button').on('click',function(){
            //alert('we');
            var val=$(this).attr('value');
            if(val==='c'){
                $('#content').css('display','block');
                $('#content2').css('display','none');
                $('#btng1 .btn-group button').removeClass('active');
                $(this).addClass('active');
                
            }
            else if(val ==='v'){
                $('#content2').css('display','block');
                $('#content').css('display','none');
                $('#btng1 .btn-group button').removeClass('active');
                $(this).addClass('active');
                
            }
        });
        $('#letmein2').on('click',function(){
            var email=$('#eml2').val();
            var pass=$('#pwd2').val();
            //alert("dfh");
            $.ajax({
		url:'checkvendorlogin.php',
		method:'POST',
               
		data:{email:email,pass:pass},
		success:function(data){
                    //alert(data);
                    if(data==="USERNAME_OR_PASSWORD_INCORRECT"){
                        $('#valert').css('display','block');
                        $('#valert1').text("Username/Password Incorrect");
                    }
                    
                    else if(data==="U_AND_P_C"){
                        window.location.href="vendor_admin/index.php";
                    }
                    else if(data==="USER_NOT_AB"){
                        $('#valert').css('display','block');
                        $('#valert1').text("User is not available");
                    }
                    //$('#rate').html(data);
		}
                
            });
            return false; 
        });
        $('#letmein').on('click',function(){
            var email=$('#eml').val();
            var pass=$('#pwd').val();
            
            $.ajax({
		url:'checklogin.php',
		method:'POST',
               
		data:{email:email,pass:pass},
		success:function(data){
                    
                    if(data==="USERNAME_OR_PASSWORD_INCORRECT"){
                        $('#f1alertdiv').css('display','block');
                        $('#f1alert').text("Username/Password Incorrect");
                    }
                    
                    else if(data==="U_AND_P_C"){
                        window.location.href="index.php";
                    }
                    else if(data==="USER_NOT_AB"){
                        $('#f1alertdiv').css('display','block');
                        $('#f1alert').text("User is not available");
                    }
                    //$('#rate').html(data);
		}
                 
            });
        return false;
    });
    });
</script>


</body>
</html>
