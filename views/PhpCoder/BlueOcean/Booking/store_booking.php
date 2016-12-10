<?php
//if(!isset($_SESSION) )session_start();
require_once("../../../../vendor/autoload.php");
use App\BITM\PhpCoder\BlueOcean\BookingInfo;

$obj_bookingInfo= new BookingInfo();
$obj_bookingInfo->prepare($_POST);
$obj_bookingInfo->store();
require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 465;
$mail->AddAddress($_SESSION['email']);
$mail->Username="bitm.b35.charles@gmail.com";               //       your gmail address
$mail->Password="bitm.b35";                        //       your gmail password
$mail->SetFrom('bitm.php22@gmail.com','Php Coder');
$mail->AddReplyTo("bitm.php22@gmail.com","Php Coder");
$mail->Subject    = "Your Reservation Info";
$message =  "You've reserved your booking successfully!";
$mail->MsgHTML($message);
$mail->Send();