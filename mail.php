<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true)

$alert = '';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	try{
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'cyrankyle.it@gmail.com';
		$mail->Password = 'hsmyagkqwisjnhsm';
		$mail->SMTPSecure = "tls";
		$mail->Port = '587';

		$mail-.setFrom('cyrankle.it@gmail.com');
		$mail->addAddress('cyrankyle1@gmail.com');

		$mail->HTML(true);
		$mail->SUbject = 'Message Received from Website:'.$name;
		$mail->Body = "Name: $name <br>Phone: $phone<br>Email: $email<br>Message: $message";

		$mail->send();
		$alert = "<div class='alert-success'><span>Message Sent! Thanks for contacting us.</span></div>";



	} catch (Exception $e){
       $alert = "<div class='alert-error'><span>'.$e->getMessage().'</span></div>";
       
	}
}
?>