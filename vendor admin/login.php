<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <?php
   include("init.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT id FROM vendor WHERE  vendor_email = '$myusername' and vendor_password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      
		
      if($count == 1) {
         //session_register("myusername");
         
        $_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         
      }
   }
?>
    <!--sign-in part -->
   <div class="container">    
    <div class="row" style="background-color: rgba(230,238,255,0.5); height:auto;">
	<div class="col-md-6 text-center" style=" height:auto; ">
            <div class="login-block text-center" >
                    <h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In</h1>
                    <p style="padding-left:0px;">Already have an account? Please sign in.</p>
                    <form role="form" method="post" action="">

                        <div class="form-group">
                            <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="E-mail" name="email" type="email" autofocus=""></div></div>
                        </div>
                        <div class="form-group">
                            <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-xs-12 col-lg-offset-3 "><input class="form-control" placeholder="Password" name="password" type="password" value=""></div></div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                         <input type = "submit" value = "login"/><br />

                        <br />
                        <div style="color:red"><?php echo $error;?></div>
                    </form>
                    <p style="padding-left:0px;color:white;"><a style="color:white;">I forgot my password</a></p>
            </div>
	</div>
        <!--sign-up part-->
	<div class="col-md-6 text-center" style=" height:auto;border-left: 2px solid #333;">
            <div class="login-block text-center" >		
		<h1><span><img src="img/signup.png" style="width:15%;"/></span>Create Account</h1>
                <p style="padding-left:0px;">set up your account</p>
                <form method="post" action="register.php">
                        
                        <p style="padding-left:0px;">By creating an account, you agree to Blue Nile's Terms and conditions and Privacy Policy</p>
                        
                </form>

            </div>
        </div>
    </div>
   </div>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
