<?php
if(!class_exists('PHPMailer')) {
    require('phpMailer/class.phpmailer.php');
	require('phpMailer/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();
$conn = mysqli_connect("localhost", "root", "", "lastdb");
$securecode=md5(uniqid(rand()));
$updatesql="UPDATE customerlogin SET passcode='{$securecode}' WHERE username='{$user['username']}'";
mysqli_query($conn,$updatesql);
$emailBody = "<div>" . $user["username"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "reset_password.php?passcode=" . $securecode. "'>" . PROJECT_HOME . "reset_password.php?passcode=" .$securecode. "</a><br><br></p>Regards,<br> Admin.</div>";

$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
//$mail->Mailer   = MAILER;

$mail->SetFrom(SERDER_EMAIL, SENDER_NAME);
//$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
//$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($user["email"]);
$mail->Subject = "Forgot Password Recovery";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Please check your email to reset password!';
}

?>
