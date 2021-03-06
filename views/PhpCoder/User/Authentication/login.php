<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BITM\PhpCoder\User\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;


$auth= new Auth();
$auth->prepare($_POST);  // this prepare() is  equivalent to setData method
$status= $auth->is_registered();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("
                <div class=\"login_success alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
    return Utility::redirect('../../../../user.php');

}else{
    Message::message("
                <div class=\"login_failed alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('../Profile/signup.php');

}


