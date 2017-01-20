<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" type="text/css" href="../css/home1.css">
<link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">
              
<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body style="padding-top: 0px;">
    <?php
   include("init.php");
   include 'registervendor.php';
   
   session_start();
   $_SESSION['N1']=$_SESSION['N2']=$_SESSION['N3']=$_SESSION['N4']=$_SESSION['N5']="";
   $error = "";
   if(isset($_POST['signin'])) {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT vendor_username FROM vendor WHERE  vendor_email = '$myusername' and vendor_password = '$mypassword'";
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
    <div class="row" id="authe" style="float:right; height:20px" >
    </div>
    <!--sign-in part -->
   <?php include '../template/headnav.php';?>
   <div class="container">    
    <div class="row" style="background-color: rgba(230,238,255,0.5); height:auto;">
	<div class="col-md-6 text-center" style=" height:auto; ">
            <div class="login-block text-center" >
                    <h1><span><img src="img/signin.png" style="width:15%;"/></span>Sign In</h1>
                    <p style="padding-left:0px;">Already have an account? Please sign in.</p>
                    <form role="form" method="post" >

                        <div class="form-group">
                            <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="E-mail" name="email" type="email" autofocus=""></div></div>
                        </div>
                        <div class="form-group">
                            <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-xs-12 col-lg-offset-3 "><input class="form-control" placeholder="Password" name="password" type="password" value=""></div></div>
                        </div>
                        
                        <input type = "submit" name="signin" value = "Sign In"/><br />

                        <br />
                        <div style="color:red"><?php echo $error;?></div>
                    </form>
                    <p style="padding-left:0px;"><a style="color:gray;">I forgot my password</a></p>
            </div>
	</div>
        <!--sign-up part-->
	<div class="col-md-6 text-center" style=" height:auto;border-left: 2px solid #333;">
            <div class="login-block text-center" >		
		<h1><span><img src="img/signup.png" style="width:15%;"/></span>Vendor Registration</h1>
                <p style="padding-left:0px;">set up your account</p>
                <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="Company Name"  required="required" name="company" type="text" ></div></div>
                    </div>
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-xs-12 col-lg-offset-3 "><input class="form-control" placeholder="E-mail"  required="required"  name="emailregister" type="email" value=""></div></div>
                    </div>
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><textarea class="form-control" placeholder="Address" name="add"  required="required"  type="text" ></textarea></div></div>
                    </div>
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="Contact Number" name="tele"  required="required"  type="text" autofocus=""></div></div>
                        <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 " style="color: red;"><?php echo $telerror?></div>
                    </div>
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="Username"  required="required"  name="user" required="required"  type="text" autofocus=""></div>
                            <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 " style="color: red;"><?php echo $usererror?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="Password"  required="required" name="passregister" id="pass" type="password" ></div></div>
                    </div
                     <div class="form-group">
                         <div class="row"><div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 "><input class="form-control" placeholder="Confirm Password"  required="required" name="confirmpass" id="cpass" type="password" ></div>
                            <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3 col-lg-6 col-xs-6 col-xs-offset-3 col-lg-offset-3 " id="checkpass"></div>
                         </div>
                     </div>

                    <input type = "submit" name="register" value = "Sign Up"/><br />

                        <p style="padding-left:0px;">By creating an account, you agree to Blue Nile's Terms and conditions and Privacy Policy</p>
                        
                </form>
            </div>
        </div>
    </div>
   </div>
        <script type="text/javascript">
            $(document).ready(function() {
               $('#cpass').keyup(function () {
                    if ($(this).val() == $('#pass').val()) {
                        $('#checkpass').html('matching').css('color', 'green');
                    } 
                    else {
                        $('#checkpass').html('not matching re enter the password').css('color', 'red');
                    }
                });
            });

        
        </script>
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
