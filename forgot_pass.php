<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("localhost", "root", "", "lastdb");
		
		$condition = "";
		if(!empty($_POST["user-login-name"]))
			$condition = " username = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = "email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from customerlogin " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
        //session_start();
        $_SESSION['N1']=$_SESSION['N2']=$_SESSION['N3']=$_SESSION['N4']=$_SESSION['N5']="";
?>
<link href="css/demo-style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="css/index.css">-->
 
 
 <link rel="stylesheet" href="css/home.css">
 <link rel="stylesheet" type="text/css" href="css/loginForm.css">
 

 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">	

<script>
function validate_forgot() {
	if((document.getElementById("user-login-name").value == "") && (document.getElementById("user-email").value == "")) {
		document.getElementById("validation-message").innerHTML = "Login name or Email is required!"
		return false;
	}
	return true
}
</script>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/routes.js"></script>
<body style="background-color:#FFF6; background-size: 100% 100%;">
	
		
		
	   
            <div class="row" id="authe" style="float:right; height:20px" >
            </div>
			
			
		
	    
		<?php include 'template/headnav.php';?>
		
                <?php include("alert.php"); ?>
<div class="row" style="margin-top:10%;">
<div class="col-md-6 col-md-offset-4">
<form name="frmForgot" id="frmForgot" method="post" style=" background-color: rgba(230,238,255,0.5); margin-top: -90px;" onSubmit="return validate_forgot();">
<h1>Forgot Password?</h1>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="field-group">
		<div><label for="username">Username</label></div>
		<div><input type="text" name="user-login-name" id="user-login-name" class="input-field"> Or</div>
	</div>
	
	<div class="field-group">
		<div><label for="email">Email</label></div>
		<div><input type="text" name="user-email" id="user-email" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
	</div>	
</form>
</div>
</div>
</body>