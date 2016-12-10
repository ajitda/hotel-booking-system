<?php
include_once('../../../../vendor/autoload.php');
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\User\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
$auth= new Auth();
$status= $auth->prepare($_POST)->is_exist();
if($status){
    Message::setMessage("<div class='alert alert-danger'>
    <strong>Taken!</strong> Email has already been taken. </div>");
    return Utility::redirect($_SERVER['HTTP_REFERER']);
}else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $obj= new User();
    $obj->prepare($_POST)->store();
    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="bitm.b35.charles@gmail.com";               //       your gmail address
    $mail->Password="bitm.b35";                        //       your gmail password
    $mail->SetFrom('bitm.php22@gmail.com','Php Coder');
    $mail->AddReplyTo("bitm.php22@gmail.com","Php Coder");
    $mail->Subject= "Your Account Activation Link";
    $message =  "Please click this link to verify your account: 
       http://localhost/phpcoder_finalproject_b35/views/PhpCoder/User/Profile/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
    $mail->MsgHTML($message);
    $mail->Send();
}
