<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Admin\Admin;

$obj= new Admin();
$obj->prepare($_GET);     // this prepare() is  equivalent to setData method
$singleUser = $obj->view();


if($singleUser->email_verified == $_GET['email_token']) {
    $obj->prepare($_GET);   // this prepare() is  equivalent to setData method
    $obj->validTokenUpdate();
}
else{

    if($singleUser->email_verified=='Yes'){
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Don't worry! </strong>This email already verified. Please login!
              </div>");
    Utility::redirect("login.php");
   }
    else{
    Message::message("
             <div class=\"alert alert-info\">
             <strong>Sorry! </strong>This Token is Invalid. Please signup with a valid email!
              </div>");
    Utility::redirect("login.php");
   }
}