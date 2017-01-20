<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "lastdb");
                $repass= md5($_POST["member_password"]);
		$sql = "UPDATE `lastdb`.`customerlogin` SET `password` = '" .$repass. "' WHERE `customerlogin`.`passcode` = '" . $_GET["passcode"] . "'";
		$result = mysqli_query($conn,$sql);
		$success_message = "Password is reset successfully.";
		
	}
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
function validate_password_reset() {
	if((document.getElementById("member_password").value == "") && (document.getElementById("confirm_password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("member_password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
}
</script>
<script src="js/routes.js"></script>
<body style="background-color:#FFF6; background-size: 100% 100%;">
	
		
		
	   
            <div class="row" id="authe" style="float:right; height:20px" >
            </div>
			
			
		
	    
		<?php include 'template/headnav.php';?>
		
                <?php include("alert.php"); ?>
<div class="row" style="margin-top:10%;">
    <div class="col-md-6 col-md-offset-4">
<form name="frmReset" id="frmReset" method="post" style="background-color: rgba(230,238,255,0.5); margin-top: -90px;" onSubmit="return validate_password_reset();">
<h1>Reset Password</h1>
	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="field-group">
		<div><label for="Password">Password</label></div>
		<div>
		<input type="password" name="member_password" id="member_password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><label for="email">Confirm Password</label></div>
		<div><input type="password" name="confirm_password" id="confirm_password" class="input-field"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="reset-password" id="reset-password" value="Reset Password" class="form-submit-button"></div>
	</div>	
</form>
</div>	
</div>
</body>
